<?php

namespace Modules\Post\Services\Actions;

use Modules\Post\Entities\Post;

class PostAction
{
    /**
     * Cria e/ou atualiza o registro
     *
     * @param  array  $request
     * @param  int|null  $id
     * @return mixed
     */
    public function handle($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'published' => $request['published'],
            'abstract' => $request['abstract'],
            'description' => $request['description'],
        ];

        if (isset($request['image'])) {
            $data += ['image' => $request['image']->store('posts')];
        }

        return Post::updateOrCreate(['id' => $id], $data);
    }
}
