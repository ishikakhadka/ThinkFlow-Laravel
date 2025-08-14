<?php


namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get("content");
        $comment->save();

        return redirect()->route("ideas.show", $idea->id)->with("success", "Comment posted successfully!!");
    }




    public function destroy(Idea $idea, Comment $comment)
    {

        if ($comment->idea_id !== $idea->id) {
            abort(404, 'Comment not found for this idea.');
        }


        if ($comment->user_id !== auth()->id()&& $idea->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }



}
