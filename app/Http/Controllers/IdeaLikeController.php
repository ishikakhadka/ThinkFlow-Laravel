<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $user = auth()->user();

        if (!$user->likes()->where('idea_id', $idea->id)->exists()) {
            $user->likes()->attach($idea->id);
            return back()->with('success', 'Liked successfully!');
        }

        return back()->with('info', 'Already liked!');
    }
    public function unlike(Idea $idea){
        $liker = auth()->user();
        $liker->likes()->detach($idea);
        return back()->with("success","Unliked successfully!!");
    }
}
