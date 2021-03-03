<?php

namespace App\Http\Controllers;

use App\Dealer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function add(){

        $dealers = Dealer::where('active',true)->orderBy('id', 'desc')->get();

        return view('product.add', [
            'dealers' => $dealers
        ]);
    }


    public function save(Request $request){

        $this->validate($request, [
            'name' => ['required', 'max:100'],
            'description' => ['required', 'max:200'],
            'price' => ['required'],
            'stock' => ['required', 'numeric'],
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->active = $request->input('active') == 'on';
        $product->dealer_id = $request->input('dealer_id');

        $product->save();

        return redirect()->route('product.list')->with([
            'message' => 'El producto ha sido creado exitosamente!!'
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
