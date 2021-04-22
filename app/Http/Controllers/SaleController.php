<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//modelos
use App\Sale;
use App\User;
use App\Customer;

class SaleController extends Controller
{
    private $status_list = ['pending', 'completed', 'cancelled'];

    public function __construct(){
        $this->middleware('auth');
    }

    public function list(){

        $sales = Sale::orderBy('id', 'desc')->get();

        return view('sale.index', [
            'sales' => $sales
        ]);
    }

    public function edit($id) {

        //$dealers = Dealer::where('active',true)->orderBy('id', 'desc')->get();
        $sale = Sale::find($id);

        if(!$sale){
            return redirect()->route('sale.list')->with([
                'message' => 'Venta no encontrada'
            ]);
        }

        return view('sale.edit', [
            'sale' => $sale,
            'users' => User::all(),
            'customers' => Customer::all(),
            'status_list' => $this->status_list
        ]);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => ['required', 'max:100'],
            'description' => ['required', 'max:200'],
            'price' => ['required'],
            'stock' => ['required', 'numeric'],
        ]);


        echo $id;
       return true;
    }

}
