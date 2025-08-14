<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



    public function show(User $user)
    {
       $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }


    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $editing_user = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'editing_user', 'ideas'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $validated = $request->validated();
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);
        return redirect()->route("profile")->with("success", "Profile updated successfully.");
    }


    public function profile()
    {
        $user = auth()->user();
        $ideas = $user->ideas()->paginate(5);
        $topUsers = User::withCount('followers')
            ->orderBy('followers_count', "DESC")
            ->limit(3)
            ->get();

        return view('users.show', [
            'user' => $user,
            'topUsers' => $topUsers,
           "ideas"=>$ideas
        ]);
    }

}
