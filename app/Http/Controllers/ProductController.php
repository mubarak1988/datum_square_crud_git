<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        /**
         * Gets the existing products from db and sends to the view for display if available
         */
        $products = Product::all()->toArray();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        /**
         * This controller is used to create a new product 
         */
        return view('product.create');
    }

    public function store(Request $request) {
        /**
         * validates the fields from the create view
         */
        $rules = [
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'stock' => 'required|integer|max:500|min:1',
            'price' => 'required|numeric|min:1',
            'type' => 'required'
        ];

        $this->validate($request, $rules);
         /**
         * inserts to the product table if validation clears
         */
        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'stock' => $request->get('stock'),
            'price' => $request->get('price'),
            'type' => $request->get('type')
        ]);

        $product->save();
        
        Session::flash('message', 'Successfully created product!');
         /**
         * on completing the cycle returns to the products index page
         */
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
         /**
         * Based on the id sent , this method is used to display the particular record
         */
        $product = Product::find($id);
        
        if ($product) {
            return view('product.show', compact('product', 'id'));
        }

        return redirect('/product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
         /**
         * open edit view for a particular product
         */
        $product = Product::find($id);

        return view('product.edit', compact('product', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $rules = [
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'stock' => 'required|integer|max:500|min:1',
            'price' => 'required|numeric|min:1',
            'type' => 'required'
        ];

        $this->validate($request, $rules);
        /**
         * Validates request sent in update operation and then updates the product table.
         */
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');
        $product->type = $request->get('type');

        $product->save();

        Session::flash('message', 'Successfully updated product!');

        return view('product.show', compact('product', 'id'));

//        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        /**
         * This methods deletes a particular record.
         */
        $product = Product::find($id);
        $product->delete();

        Session::flash('message', 'Successfully deleted product!');

        return redirect('/product');
    }

}
