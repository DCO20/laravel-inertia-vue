<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests;
use Modules\Post\Services\PostServiceInterface;

class PostController extends Controller
{
    /**
     * Método Construtor
     *
     * @param  Post  $post
     * @param  PostServiceInterface  $post_service
     */
    public function __construct(
        protected  Post $post,
        protected PostServiceInterface $post_service
    ) {
    }

    /**
     * Tela Inicial
     *
     * @return \Inertia\Inertia
     */
    public function index()
    {
        return Inertia::render('Admin/Post/Index', [
            'posts' => $this->post->paginate(9),
        ]);
    }

    /**
     * Tela de criação
     *
     * @return \Inertia\Inertia
     */
    public function create()
    {
        return Inertia::render('Admin/Post/Create');
    }

    /**
     * Cadastro
     *
     * @param  Requests\PostRequest  $request
     * @return void
     */
    public function store(Requests\PostRequest $request)
    {
        $this->post_service->updateOrCreate($request->all());

        return redirect()
            ->route('post.index')->with('message', 'Cadastro realizado com sucesso!');
    }

    /**
     * Tela de exibição
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return '';
    }

    /**
     * Tela de edição
     *
     * @param  int  $id
     * @return \Inertia\Inertia
     */
    public function edit($id)
    {
        $post = $this->post->findOrFail($id);

        return Inertia::render('Admin/Post/Edit', compact('post'));
    }

    /**
     * Atualização
     *
     * @param  Requests\PostRequest  $request
     * @param  int  $id
     * @return void
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = $this->post->findOrFail($id);

        if ($request->image) {
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }
        }

        $this->post_service->updateOrCreate($request->all(), $post->id);

        return redirect()
            ->route('post.edit', $id)->with('message', 'Atualização realizado com sucesso!');
    }

    /**
     * Tela de exclusão
     *
     * @param  int  $id
     * @return \Inertia\Inertia
     */
    public function confirmDelete($id)
    {
        $post = $this->post->findOrFail($id);

        return Inertia::render('Admin/Post/Delete', compact('post'));
    }

    /**
     * Exclusão
     *
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        $post = $this->post->findOrFail($id);

        $this->post_service->delete($post);

        return redirect()
            ->route('post.index')->with('message', 'Exclusão realizado com sucesso!');
    }
}
