<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function viewAll(Request $request) {
        $posts = Post::paginate(12);

        if($request->ajax()) {
            $view = view('child', compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view("gallery", compact("posts"));

    }
}
