<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests;
use Modules\Category\Services\CategoryServiceInterface;

class CategoryController extends Controller
{
    /**
     * Método Construtor
     *
     * @param  Category  $category
     * @param  CategoryServiceInterface  $category_service
     */
    public function __construct(
        protected Category $category,
        protected CategoryServiceInterface $category_service
    ) {
    }

    /**
     * Tela inicial
     *
     * @return void
     */
    public function index()
    {
        $categories = $this->category->paginate(9);

        return Inertia::render('Admin/Category/Index', compact('categories'));
    }

    /**
     * Tela criação
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Admin/Category/Create');
    }

    /**
     * Cadastro
     *
     * @param  Requests\CategoryRequest  $request
     * @return void
     */
    public function store(Requests\CategoryRequest $request)
    {
        $this->category_service->updateOrCreate($request->all());

        return redirect()
            ->route('category.index')->with('message', 'Cadastro realizado com sucesso!');
    }

    /**
     * tela de exibição
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        $category = $this->category->findOrFail($id);

        return '';
    }

    /**
     * Tela de edição
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return Inertia::render('Admin/Category/Edit', compact('category'));
    }

    /**
     * Atualização
     *
     * @param  Requests\CategoryRequest  $request
     * @param  int  $id
     * @return void
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->updateOrCreate($request->all(), $category->id);

        return redirect()
            ->route('category.edit', $id)->with('message', 'Atualização realizado com sucesso!');
    }

    /**
     * Tela de Exclusão
     *
     * @param  int  $id
     * @return void
     */
    public function confirmDelete($id)
    {
        $category = $this->category->findOrFail($id);

        return Inertia::render('Admin/Category/Delete', compact('category'));
    }

    /**
     * Exclusão
     *
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->delete($category);

        return redirect()
            ->route('category.index')->with('message', 'Exclusão realizado com sucesso!');
    }
}
