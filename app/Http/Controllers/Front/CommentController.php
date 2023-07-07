<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        if (!app()->runningInConsole() && !request()->ajax()) {
            abort(403);
        }
    }
    public function store()
    {
    }
    public function destroy()
    {
    }
    public function comments(Post $post)
    {
        $comments = $post->validComments()
            ->latest()
            ->get();
        return [
            'html' => view('post/comments', compact('comments'))->render(),
        ];
    }
}
