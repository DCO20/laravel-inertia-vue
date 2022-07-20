<?php

namespace Modules\Category\Services;

use Modules\Category\Entities\Category;

interface CategoryServiceInterface
{

	public function updateOrCreate($request, $id = null);

	public function delete(Category $category);
}
