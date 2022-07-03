<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function get(){
        $products  = DB::select('select * from products order by value');
        return $products;
    }
}
