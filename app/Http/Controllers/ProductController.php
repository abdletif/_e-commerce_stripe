<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){

        return view('products.index',[
            'products' => Product::paginate(12)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
}
