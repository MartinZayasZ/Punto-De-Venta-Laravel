<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//modelos
use App\Sale;

class SaleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function list(){

        $sales = Sale::orderBy('id', 'desc')->get();

        return view('sale.index', [
            'sales' => $sales
        ]);
    }

}
