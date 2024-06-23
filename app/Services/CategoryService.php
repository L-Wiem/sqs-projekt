<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function fetchAll()
    {
        return Category::all();
    }
}
