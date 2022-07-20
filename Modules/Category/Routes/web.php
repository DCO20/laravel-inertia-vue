<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('dashboard/categoria')
    ->as('category.')
    ->middleware(['auth'])
    ->group(
        function () {
            Route::get('/', [CategoryController::class, 'index'])
                ->name('index');

            Route::get('{id}/ver', [CategoryController::class, 'show'])
                ->name('show');

            Route::get('/cadastrar', [CategoryController::class, 'create'])
                ->name('create');

            Route::post('/', [CategoryController::class, 'store'])
                ->name('store');

            Route::get('{id}/editar', [CategoryController::class, 'edit'])
                ->name('edit');

            Route::put('{id}/editar', [CategoryController::class, 'update'])
                ->name('update');

            Route::get('{id}/confirmar-exclusao', [CategoryController::class, 'confirmDelete'])
                ->name('confirm_delete');

            Route::delete('{id}/excluir', [CategoryController::class, 'delete'])
                ->name('delete');
        }
    );
