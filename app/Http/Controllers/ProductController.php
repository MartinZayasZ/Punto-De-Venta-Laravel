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

        $products = Product::orderBy('id', 'desc')->get();

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function delete($id){

        $product = Product::find( $id );

        if( $product ){
            $product->delete();
            $message = 'El producto se ha borrado correctamente!!';
        }else{
            $message = 'El producto no se ha borrado, intentelo de nuevo más tarde.';
        }

        return redirect()->route('product.list')->with([
            'message' => $message
        ]);
    }

}
