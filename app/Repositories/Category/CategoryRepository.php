<?php

namespace App\Repositories\Category;

use App\Models\ProductCategory;

class CategoryRepository
{
    protected $productCategory;

    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }

    // Get all
    public function gatAll()
    {
        return $this->productCategory->all();
    }

    // Get id
    public function getId($id)
    {
        return $this->productCategory->find($id);
    }

    // Add Category
    public function store($request)
    {
        $category = $request->all();
        $category['photo'] = $request->file('photo')->store('assets/category', 'public');
        ProductCategory::create($category);
    }

    // Update
    public function update($request, $id)
    {
        $categoryId = $this->productCategory->find($id);
        $category = $request->input();
        if ($request->file("photo")) {
            $category['photo'] = $request->file('photo')->store('assets/category', 'public');
        } else {
            $category["photo"] = $categoryId->photo;
        }
        $categoryId->update($category);
    }
}
