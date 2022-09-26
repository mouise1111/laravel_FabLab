<?php

namespace App\Http\Controllers;

// use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $total =  doubleval(Cart::priceTotal()) + doubleval(Cart::tax());
        return view(
            'cart.index',
            [
                'cart' => $cart,
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));

        //id, name, quantity, price and /weight/ 
        Cart::add($product->id, $product->name, 1, $product->price);
        return redirect()->route('cart.index')->with('message', $product->name . ' Succesfully added to cart ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view(
            'cart.edit',
            [
                'product' => $product
            ]
        );
    }
    public function increase($rowId)
    {

        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        return redirect('/cart');
    }
    public function decrease($rowId)
    {

        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        return redirect('/cart');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart');
    }
}