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
         ->with('user:id,name')
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
}
