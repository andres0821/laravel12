<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    //updating
    public function updating(Post $post)
    {
        if ($post->is_published && !$post->published_at) {
            $post->published_at = now();
        } 
    }
}
