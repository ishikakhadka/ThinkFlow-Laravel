<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea, Request $request)
    {

        $editing = $request->query('editing') == 1;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function store()
    {
        $validated=request()->validate([
            'content' => 'required|min:2|max:240',
        ]);
        $validated['user_id'] = auth()->id();

         Idea::create($validated);
        return redirect()->route('dashboard')->with('success', "Idea Created Successfully!");
    }

    public function destroy(Idea $idea)
    {
        // $this->authorize("idea.delete", $idea);
        $this->authorize("delete", $idea);
        $idea->delete();
        return redirect()->route('dashboard');
    }
    public function edit(Idea $idea)
    {
        // $this->authorize("idea.edit", $idea); =>Gates

        $this->authorize("update", $idea);
        return redirect()->route('ideas.show', ['idea' => $idea->id, 'editing' => 1]);
    }

    public function update(Request $request, Idea $idea)
    {
        // $this->authorize("idea.edit", $idea); =>Gates
        $this->authorize("update", $idea);
       $validated= $request->validate([
            'content' => 'required|min:2|max:240',
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
    }



}
