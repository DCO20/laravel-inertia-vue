<?php

namespace Modules\Post\Services;

use Modules\Post\Entities\Post;

interface PostServiceInterface
{
    /**
     * Cria e/ou atualiza o registro
     *
     * @codeCoverageIgnore
     *
     * @param  array  $request
     * @param  int|null  $id
     * @return void
     */
    public function updateOrCreate($request, $id = null);

    /**
     * Exclui o registro
     *
     * @codeCoverageIgnore
     *
     * @param  \Modules\Post\Entities\Post  $post
     * @return void
     */
    public function delete(Post $post);
}
