<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'colour_id' => 'required|exists:colours,id',
            'size_id' => 'required|exists:sizes,id',
            'type_id' => 'required|exists:types,id',
            'storage_id' => 'required|exists:storages,id',
        ]);

        Product::create($request->all());

        return redirect(route('product.index'))->with(['success' => 'Product Baru Ditambahkan.']);
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
        $product = Product::find($id);

        return view('product.edit', compact('product'));
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
        $request->validate([
            'colour_id' => 'required|exists:colours,id',
            'size_id' => 'required|exists:sizes,id',
            'type_id' => 'required|exists:types,id',
            'storage_id' => 'required|exists:storages,id',

        ]);

        Product::find($id)->update($request->all());

        return redirect(route('product.index'))->with(['success' => 'Product Sudah Diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete($id);

        return redirect(route('product.index'))->with(['success' => 'Product Sudah Dihapus.']);
    }
}
