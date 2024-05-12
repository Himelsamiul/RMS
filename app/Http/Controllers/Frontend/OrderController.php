<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function  addtocart($menuId)
    {
       
      
        $menu=Menu::find($menuId);
        $myCart=session()->get('cart');
        
        if(empty($myCart)){
            //1. add to cart
            $newCart[$menuId]=[
                'id'=>$menuId,
                'name'=>$menu->name,
                'price'=>$menu->price,
                'image'=>$menu->image,
                'quantity'=>1,
                'subtotal'=>$menu->price * 1
            ];

            // dd($newCart);

            session()->put('cart',$newCart);

            notify()->success('Product added to cart successfully.');
            return redirect()->back();

        }
        else{
            dd("cart not empty");
        }


    }

}
