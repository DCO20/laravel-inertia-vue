<?php

namespace App\Observers;

use Illuminate\Support\Str;
use Modules\Post\Entities\Post;

class PostObserver
{
    /**
     * Handle the post "creating" event.
     *
     * @param  \Modules\Post\Entities\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->url = Str::kebab($post->title);
    }

    /**
     * Handle the post "updating" event.
     *
     * @param  \Modules\Post\Entities\Post  $post
     * @return void
     */
    public function updating(Post $post)
    {
        $post->url = Str::kebab($post->title);
    }
}
