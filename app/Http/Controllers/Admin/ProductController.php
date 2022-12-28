<?php

namespace App\Http\Controllers\Admin;

use App\Dto\Response\ProductResponse;
use App\Helper\ProductHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Repository\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this
            ->productService
            ->with('prices')
            ->with('user')
            ->paginate($request->get('limit', 10), ['*'], 'page', $request->get('page', 1));

        return (ProductResource::collection($products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = array_merge($request->validated(),
            [
                'sku' => ProductHelper::generateSku(),
                'user_id' => Auth::user()->id,
                'status' => Product::PRODUCT_STATUS_PENDING,
                'visibility' => Product::PRODUCT_VISIBILITY_PRIVATE,
            ]
        );

        $product = $this->productService->create($product);

        return new ProductResource($product->load('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource(
            $this
                ->productService
                ->show($product->id)
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
