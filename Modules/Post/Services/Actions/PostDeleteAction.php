<?php

namespace Modules\Post\Services\Actions;

class PostDeleteAction
{
    /**
     * Exclui o registro
     *
     * @param  \Modules\Post\Entities\Post  $post
     * @return void
     */
    public function handle($post)
    {
        $post->delete();
    }
}
