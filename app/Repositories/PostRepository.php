<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
   protected function queryOnline()
   {
      return Post::select(
         'id',
         'title',
         'image',
         'user_id',
      )
         ->with('users:id,name')
         ->whereOnline(true);
   }

   protected function queryOnlineOrderByDate()
   {
      return $this->queryOnline()->latest();
   }

   public function getOnlineOrderByDate($nbrPages)
   {
      return $this->queryOnlineOrderByDate()->paginate($nbrPages);
   }

   public function getPostById($id)
   {
      $post = Post::with(
         'users:id,name',
         'tags:id,tag',
      )
         ->withCount('validComments')
         ->whereId($id)
         ->firstOrFail();

      // Previous post
      $post->previous = $this->getPreviousPost($post->id);

      // Next post
      $post->next = $this->getNextPost($post->id);

      return $post;
   }

   protected function getPreviousPost($id)
   {
      return Post::select('title', 'id')
         ->whereOnline(true)
         ->latest('id')
         ->firstWhere('id', '<', $id);
   }

   protected function getNextPost($id)
   {
      return Post::select('title', 'id')
         ->whereOnline(true)
         ->oldest('id')
         ->firstWhere('id', '>', $id);
   }
}
