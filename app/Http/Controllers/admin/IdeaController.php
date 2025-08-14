<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class IdeaController extends Controller
{
    public function index()
    {

        $ideas = Idea::latest();
       
        return view("admin.ideas.index",[
            "ideas"=>$ideas->paginate(7)
        ]);
    }
}
