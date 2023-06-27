<?php

use Illuminate\Support\Facades\Route as FacadesRoute;

if (!function_exists('getImage')) {
   function getImage($post, $thumb = false)
   {
      $url = "storage/photos/{$post->users->id}";
      if ($thumb) $url .= '/thumbs';
      return asset("{$url}/{$post->image}");
   }
}

if (!function_exists('currentRoute')) {
   function currentRoute($route)
   {
      return FacadesRoute::currentRouteNamed($route) ? ' class=current' : '';
   }
}
