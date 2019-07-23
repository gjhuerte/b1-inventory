<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Product\TypeService;
use App\Http\Requests\ProductRequests\TypeRequests\StoreRequest;
use App\Http\Requests\ProductRequests\TypeRequests\UpdateRequest;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TypeService $service)
    {
        $products = $service->searchFrom($request->q)->get();

        return view('product.type.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, TypeService $service)
    {
        $service->create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('products.type.index')
            ->with('success', 'You have successfully created a product');
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
    public function edit(TypeService $service, $id)
    {
        $product = $service->find($id);

        return view('product.type.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TypeService $service, $id)
    {
        $service->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ], $id);

        return redirect()
            ->route('products.type.index')
            ->with('success', 'You have successfully updated a product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeService $service, $id)
    {
        $service->delete($id);

        return redirect()
            ->route('products.type.index')
            ->with('success', 'You have successfully removed a product');
    }
}
