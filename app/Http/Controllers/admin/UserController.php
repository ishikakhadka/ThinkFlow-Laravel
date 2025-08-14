<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {

    $users=User::latest();
        return view("admin.users.index",
        ["users"=>$users->paginate(5),]
    );
    }
}
