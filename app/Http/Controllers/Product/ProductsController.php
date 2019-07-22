<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Product\TypeService;
use App\Http\Services\Product\ProductService;
use App\Http\Requests\ProductRequests\ProductRequests\StoreRequest;
use App\Http\Requests\ProductRequests\ProductRequests\UpdateRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $type = (new TypeService)->find($id);
        $service = new ProductService($id);
        $products = $service->get();

        return view('product.product.index', compact('products', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $type = (new TypeService)->find($type);

        return view('product.product.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, $id)
    {
        $service = new ProductService($id);
        $service->create([
            'code' => $request->code,
        ]);

        return redirect()
            ->route('products.product.index', $id)
            ->with('success', 'You have successfully created a product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($__type, $__id)
    {
        $type = (new TypeService)->find($__type);
        $product = (new ProductService($__type))->findFirst($__id);

        return view('product.product.edit', compact('product', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $type, $id)
    {
        $service = new ProductService($type);
        $service->update([
            'code' => $request->code,
        ], $id);

        return redirect()
            ->route('products.product.index', $type)
            ->with('success', 'You have successfully updated a product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id)
    {
        $service = new ProductService($type);
        $service->delete($id);

        return redirect()
            ->route('products.product.index', $type)
            ->with('success', 'You have successfully removed a product');
    }
}
