<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function list(){

        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('product.index', [
            'products' => $products
        ]);
    }

}
