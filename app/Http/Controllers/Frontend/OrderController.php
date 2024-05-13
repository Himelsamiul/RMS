<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function  addToCart($productId)
    {
       
      
        $product=Menu::find($productId);
        $myCart=session()->get('cart');
        
        if(empty($myCart)){
            //1. add to cart
            $newCart[$productId]=[
                'id'=>$productId,
                'name'=>$product->name,
                'price'=>$product->price,
                'image'=>$product->image,
                'quantity'=>1,
                'subtotal'=>$product->price * 1
            ];

            // dd($newCart);

            session()->put('cart',$newCart);

            notify()->success('Product added to cart successfully.');
            return redirect()->back();

        }
        else{
            //check product exist or not
            if(array_key_exists($productId,$myCart)){
                //update quantity

                
                $myCart[$productId]['quantity']= $myCart[$productId]['quantity'] + 1;
                $myCart[$productId]['subtotal']= $myCart[$productId]['quantity'] * $myCart[$productId]['price'];
                
                session()->put('cart',$myCart);

                notify()->success('Food quantity updated.');
                return redirect()->back();

            }else{

                //add to cart new food
                $myCart[$productId]=[
                    'id'=>$productId,
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'image'=>$product->image,
                    'quantity'=>1,
                    'subtotal'=>$product->price * 1
                ];

                 session()->put('cart',$myCart);

            notify()->success('New Food added to cart successfully.');
            return redirect()->back();


            }


        }


    }

    public function viewCart()
    {
        return view('frontend.pages.cart');
    }

    public function checkout()
    {
        return view('frontend.pages.checkout');    
    }
}
