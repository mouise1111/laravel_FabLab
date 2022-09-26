<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // index - show all listings
    // show - show single listing
    // create - show form to create new listing
    // store - store new listing
    // edit - show form to edit listing
    // update - update listing
    // destroy - destroy listing (delete)
    public function index()
    {
        return view(
            'products.index',
            [
                'products' => Product::paginate(6)
            ]
        );
    }

    public function show(Product $product)
    {
        return view(
            'products.show',
            [
                'product' => $product
            ]
        );
    }

    public function create()
    {
        return view(
            'admin.products.create'
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
        $formFields = $request->validate([
            'name' => 'required|unique:products',
            'company' => 'required',
            'price' => ['required', 'integer'],
            'image',
            'description' => ['required', 'min:20', 'max:255']
        ]);
        Product::create($formFields);
        return view('admin.index')->with('message', 'Product created succesfully');
    }
}