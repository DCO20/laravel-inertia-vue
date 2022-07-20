<?php

namespace Modules\Category\Services\Actions;

class CategoryDeleteAction
{
    public function handle($category)
    {
        $category->delete();
    }
}
