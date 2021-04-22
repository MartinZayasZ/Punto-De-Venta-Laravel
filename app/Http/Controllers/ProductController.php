<?php

namespace App\Http\Controllers;

use App\Distributor;
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
        $distributors = Distributor::where('active',true)->orderBy('id', 'desc')->get();
        return view('product.add', [
            'distributors' => $distributors
        ]);
    }

    public function edit($id) {

        $distributors = Distributor::where('active',true)->orderBy('id', 'desc')->get();
        $product = Product::find($id);

        if(!$product){
            return redirect()->route('product.list')->with([
                'message' => 'Producto no encontrado'
            ]);
        }

        return view('product.edit', [
            'distributors' => $distributors,
            'product' => $product
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
        $product->distributor_id = $request->input('distributor_id');

        $product->save();

        return redirect()->route('product.list')->with([
            'message' => 'El producto ha sido creado exitosamente!!'
        ]);
    }

    public function update(Request $request){

        $this->validate($request, [
            'name' => ['required', 'max:100'],
            'description' => ['required', 'max:200'],
            'price' => ['required'],
            'stock' => ['required', 'numeric'],
        ]);

        //Realizamos la busqueda el producto
        $product = Product::find($request->input('product_id'));

        //actualizamos los valores del producto
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->active = $request->input('active') == 'on';
        $product->distributor_id = $request->input('distributor_id');

        $product->update();

        return redirect()->route('product.edit', ['id'=> $product->id])->with([
            'message' => 'El producto ha sido actualizado exitosamente!!'
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
