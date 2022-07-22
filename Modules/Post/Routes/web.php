<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

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

Route::prefix('dashboard/postagem')
    ->as('post.')
    ->middleware(['auth'])
    ->group(
        function () {
            Route::get('/', [PostController::class, 'index'])
                ->name('index');

            Route::get('{id}/ver', [PostController::class, 'show'])
                ->name('show');

            Route::get('/cadastrar', [PostController::class, 'create'])
                ->name('create');

            Route::post('/', [PostController::class, 'store'])
                ->name('store');

            Route::get('{id}/editar', [PostController::class, 'edit'])
                ->name('edit');

            Route::put('{id}/editar', [
                PostController::class, 'update',
            ])
                ->name('update');

            Route::get('{id}/confirmar-exclusao', [PostController::class, 'confirmDelete'])
                ->name('confirm_delete');

            Route::delete('{id}/excluir', [PostController::class, 'delete'])
                ->name('delete');
        }
    );
