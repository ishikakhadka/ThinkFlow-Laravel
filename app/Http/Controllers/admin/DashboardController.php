<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
public function index(){

        $ideas = Idea::latest();
        $comments = Comment::all();
        $users = User::all();
    return view("admin.dashboard",compact("ideas","comments","users")

);
}
}
