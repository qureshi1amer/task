<?php

namespace App\Http\Controllers;

use App\Enums\ResourceName;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(
            Category::class,
            ResourceName::CATEGORY,
            ['message' => __('exceptions.un_authorized')
        ]);
    }
    public function index()
    {
        $categories = Category::all();

        dd($categories);
    }


    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        dd($category);
    }

    public function show(Category $category)
    {
        dd($category);
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        dd($category);
    }

    public function destroy(Category $category)
    {
        $category->withoutRelations()->delete();
    }
}
