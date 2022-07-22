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
    protected $post;

    protected $post_service;

    public function __construct(
        Post $post,

        PostServiceInterface $post_service
    ) {
        $this->post = $post;

        $this->post_service = $post_service;
    }

    public function index()
    {
        return Inertia::render('Admin/Post/Index', [
            'posts' => $this->post->paginate(9),
            'image' => asset('storage/'.$this->post->image),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Post/Create');
    }

    public function store(Requests\PostRequest $request)
    {
        $this->post_service->updateOrCreate($request->all());

        return redirect()
            ->route('post.index')->with('message', 'Cadastro realizado com sucesso!');
    }

    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return '';
    }

    public function edit($id)
    {
        $post = $this->post->findOrFail($id);

        return Inertia::render('Admin/Post/Edit', compact('post'));
    }

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

    public function confirmDelete($id)
    {
        $post = $this->post->findOrFail($id);

        return Inertia::render('Admin/Post/Delete', compact('post'));
    }

    public function delete($id)
    {
        $post = $this->post->findOrFail($id);

        $this->post_service->delete($post);

        return redirect()
            ->route('post.index')->with('message', 'Exclusão realizado com sucesso!');
    }
}
