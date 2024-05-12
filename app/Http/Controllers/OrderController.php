<?php

namespace App\Http\Controllers;

use App\Models\customerreg;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderstore(){

        return view('backend.pages.order.order');
         
    }
}
