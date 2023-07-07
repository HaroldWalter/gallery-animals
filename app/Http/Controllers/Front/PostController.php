<?php

namespace App\Http\Controllers\Front;

use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Tag;
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

   public function tag(Tag $tag)
   {
      $posts = $this->postRepository->getOnlineOrderByDateForTag($this->nbrPages, $tag->id);
      $title = __('Posts for tag ') . '<strong>' . $tag->tag . '</strong>';
      return view('post.index', compact('posts', 'title'));
   }

   
}
