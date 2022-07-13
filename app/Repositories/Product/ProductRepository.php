<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    // Get All Product
    public function getAll()
    {
        return $this->product->with(["ProductCategory"]);
    }

    // Store Product
    public function store($data)
    {
        return $this->product->create($data);
    }

    // Get product bu id
    public function getId($id)
    {
        return $this->product->with(["ProductCategory", "GalleryProduct", "User"])->find($id);
    }

    //Update
    public function update($data, $id)
    {
        $product = $this->product->findOrFail($id);
        $product->update($data);
    }

    // Delete Product
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();
    }

    // Format response
    public function format($product)
    {
        return [
            "id" => $product->id,
            "name" => $product->name,
            "price" => $product->price,
        ];
    }
}
