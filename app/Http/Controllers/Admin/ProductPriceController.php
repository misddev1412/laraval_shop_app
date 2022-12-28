<?php

namespace App\Http\Controllers\Admin;

use App\Dto\Response\ProductPriceResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPrice\CreateProductPriceRequest;
use App\Http\Resources\ProductPrice\ProductPriceResource;
use App\Repository\ProductPrice\ProductPriceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductPriceController extends Controller
{
    private ProductPriceService $productPriceService;

    public function __construct(ProductPriceService $productPriceService)
    {
        $this->productPriceService = $productPriceService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $productId, CreateProductPriceRequest $request)
    {
        $productPrice = array_merge($request->validated(), [
            'product_id' => $productId,
        ]);

        if (!Auth::user()->hasPermission('product_price.active')) {
            $productPrice['status'] = 'INACTIVE';
        }

        $productPrice = $this->productPriceService->create($productPrice);

        return (new ProductPriceResponse())->toDetail($productPrice);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductPriceResource($this->productPriceService->find($id)->with('product')->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
