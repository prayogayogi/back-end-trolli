<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\GalleriProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Response;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;

class ProductController extends Controller
{
    protected $productRepository;
    protected $CategoryRepository;

    /**
     * Construct From ProductService.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $CategoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->CategoryRepository = $CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getAll()->get();
        return response()->view("pages.product.index", [
            "products" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->CategoryRepository->gatAll();
        return response()->view("pages.product.add", [
            "categories" => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->input();
        $product["user_id"] = Auth::user()->id;
        $data = $this->productRepository->store($product);
        $id = $data->id;

        if ($request->file("photo")) {
            $files = $request->file("photo");
            foreach ($files as $file) {
                GalleriProduct::create([
                    "product_id" => $id,
                    "photo" => $file->store('assets/gallery', 'public')
                ]);
            }
        }

        return redirect()->route("product.index")->with("message", "Data Product Berhasil di tambahkan");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->CategoryRepository->gatAll();
        $product = $this->productRepository->getId($id);
        return response()->view("pages.product.edit", [
            "product" => $product,
            "categories" => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $this->productRepository->update($data, $id);
        return redirect()->route("product.index")->with("message", "Data Product Berhasil di ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->destroy($id);
        return redirect()->route("product.index")->with("message", "Data Product Berhasil di hapus");
    }
}
