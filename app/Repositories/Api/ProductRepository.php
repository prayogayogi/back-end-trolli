<?php

namespace App\Repositories\Api;

use App\Models\Product;
use App\Helpers\ResponseFormatter;
use App\Http\Resources\Api\ProductResource;
use App\Repositories\Product\ProductRepository as ProductProductRepository;

class ProductRepository
{
    protected $product;
    protected $productRepository;

    public function __construct(Product $product, ProductProductRepository $productRepository)
    {
        $this->product = $product;
        $this->productRepository = $productRepository;
    }

    public function all($request)
    {
        $id         = $request->input("id");
        $name       = $request->input("name");
        $type       = $request->input("type");
        $limit      = $request->input("page", 6);
        $price_from = $request->input("price_from");
        $price_to   = $request->input("price_to");

        if ($id) {
            $product = $this->getId($id);
            try {
                return ResponseFormatter::success($product, "Data produk berhasil diambil");
            } catch (\Throwable $th) {
                return ResponseFormatter::error(null, "Data produk tidak ada");
            }
        }

        $product = Product::with(["User"]);
        if ($name)
            $product->where("name", "like", "%" . $name . "%");

        if ($type)
            $product->where("type", "like", "%" . $type . "%");

        if ($price_from)
            $product->where("price", ">=", $price_from);

        if ($price_to)
            $product->where("price", "<=", $price_to);
        $data = $product->paginate($limit);
        return ResponseFormatter::success(
            [
                "product" => ProductResource::collection($data),
                "first_page_url" => $data->previousPageUrl(),
                "next_page_url" => $data->nextPageUrl(),
            ],
            "Data list product berhasil diambil"
        );
    }

    // Get product bu id
    public function getId($id)
    {
        return new ProductResource($this->product->find($id));
    }
}
