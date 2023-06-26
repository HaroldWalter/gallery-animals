<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function viewAllPublic(Request $request)
    {
        $posts = Post::where('online', 1)->paginate(12);

        if ($request->ajax()) {
            $view = view('post.child', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view("post.index", compact("posts"));
    }

    public function viewPublicPost($id)
    {
        try {
            $product= Post::where('online',1)
                ->where('id', $id)
                ->firstOrFail();
            
        } catch (\Exception $e) {
            return abort(404);
        }
    }


    
}
