<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Repositories\Api\ProductRepository;

class ProductController extends Controller
{
    protected $ProductRepository;

    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    public function all(Request $request)
    {
        return $this->ProductRepository->all($request);
    }
}
