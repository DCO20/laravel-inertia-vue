<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests;
use Modules\Category\Services\CategoryServiceInterface;

class CategoryController extends Controller
{
    protected $category;

    protected $category_service;

    public function __construct(
        Category $category,
        CategoryServiceInterface $category_service
    ) {
        $this->category = $category;

        $this->category_service = $category_service;
    }

    public function index()
    {
        $categories = $this->category->paginate(9);

        return Inertia::render('Admin/Category/Index', compact('categories'));
    }

    public function create()
    {
        return Inertia::render('Admin/Category/Create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        $this->category_service->updateOrCreate($request->all());

        return redirect()
            ->route('category.index')->with('message', 'Cadastro realizado com sucesso!');
    }

    public function show($id)
    {
        $category = $this->category->findOrFail($id);

        return '';
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return Inertia::render('Admin/Category/Edit', compact('category'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->updateOrCreate($request->all(), $category->id);

        return redirect()
            ->route('category.edit', $id)->with('message', 'Atualização realizado com sucesso!');
    }

    public function confirmDelete($id)
    {
        $category = $this->category->findOrFail($id);

        return Inertia::render('Admin/Category/Delete', compact('category'));
    }

    public function delete($id)
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->delete($category);

        return redirect()
            ->route('category.index')->with('message', 'Exclusão realizado com sucesso!');
    }
}
