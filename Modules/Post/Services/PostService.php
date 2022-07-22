<?php

namespace Modules\Post\Services;

use Illuminate\Support\Facades\DB;
use Modules\Post\Services\Actions\PostAction;
use Modules\Post\Services\Actions\PostDeleteAction;

class PostService implements PostServiceInterface
{
    protected $post;

    protected $post_delete;

    public function __construct(
        PostAction $post,
        PostDeleteAction $post_delete
    ) {
        $this->post = $post;
        $this->post_delete = $post_delete;
    }

    /**
     * Cria e/ou atualiza o registro
     *
     * @param  array  $request
     * @param  null|int  $id
     * @return mixed
     */
    public function updateOrCreate($request, $id = null)
    {
        DB::beginTransaction();

        try {
            $post = $this->post->handle($request, $id);

            DB::commit();

            return $post;
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     *
     * @param  \Modules\Post\Entities\Post  $post
     * @return void
     */
    public function delete($post)
    {
        DB::beginTransaction();

        try {
            $this->post_delete->handle($post);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
