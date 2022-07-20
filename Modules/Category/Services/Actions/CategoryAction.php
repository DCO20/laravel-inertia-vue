<?php

namespace Modules\Category\Services\Actions;

use Modules\Category\Entities\Category;

class CategoryAction
{

	public function handle($request, $id)
	{
		$data = [
			'name' => $request['name'],
			'active' => $request['active'],
		];

		return Category::updateOrCreate(['id' => $id], $data);
	}
}
