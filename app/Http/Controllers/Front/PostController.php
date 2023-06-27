<?php

namespace App\Http\Controllers\Front;

use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller
{
   protected $postRepository;
   protected $nbrPages;

   public function __construct(PostRepository $postRepository)
   {
      $this->postRepository = $postRepository;
      $this->nbrPages = config('app.nbrPages.posts');
   }

   public function index()
   {
      $posts = $this->postRepository->getOnlineOrderByDate($this->nbrPages);

      return view('post.index', compact('posts'));
   }

   public function show(Request $request, $id)
   {
      $post = $this->postRepository->getPostById($id);

      return view('post.detail', compact('post'));
   }
}
