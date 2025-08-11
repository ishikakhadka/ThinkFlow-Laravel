<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class TrendingController extends Controller
{

    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $followingIds = $user->followings()->pluck("user_id");

        $ideas = Idea::whereIn("user_id", $followingIds)
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(10)
            ->get();

     

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', "%" . request()->get('search') . "%");
        }
        return view('shared.trending', [
            'ideas' => $ideas,
        ]);


    }
}
