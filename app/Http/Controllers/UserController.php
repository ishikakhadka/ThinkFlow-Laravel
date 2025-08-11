<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
       public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show',compact('user','ideas'));
    }


    public function edit(User $user)
    {
        $editing_user = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.edit',compact('user','editing_user','ideas'));
    }


    public function update(User $user)
    {
        $validated = request()->validate([
            "name" => "required|min:3|max:240",
            "bio" => "nullable|max:255",
            "image" => "image",
        ]);
if(request()->has('image')){
    $imagePath=request()->file('image')->store('profile','public');
    $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image?? '');
}

        $user->update($validated);
        return redirect()->route("profile")->with("success","Profile updated successfully.");
    }


    public function profile()
    {
        return $this->show(auth()->user());
    }
}
