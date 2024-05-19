<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function  addToCart($productId)
    {


        $product = Menu::find($productId);
        $myCart = session()->get('cart');

        if (empty($myCart)) {
            //1. add to cart
            $newCart[$productId] = [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
                'subtotal' => $product->price * 1
            ];

            // dd($newCart);

            session()->put('cart', $newCart);

            notify()->success('Product added to cart successfully.');
            return redirect()->back();
        } else {
            //check product exist or not
            if (array_key_exists($productId, $myCart)) {
                //update quantity


                $myCart[$productId]['quantity'] = $myCart[$productId]['quantity'] + 1;
                $myCart[$productId]['subtotal'] = $myCart[$productId]['quantity'] * $myCart[$productId]['price'];

                session()->put('cart', $myCart);

                notify()->success('Food quantity updated.');
                return redirect()->back();
            } else {

                //add to cart new food
                $myCart[$productId] = [
                    'id' => $productId,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1,
                    'subtotal' => $product->price * 1
                ];

                session()->put('cart', $myCart);

                notify()->success('New Food added to cart successfully.');
                return redirect()->back();
            }
        }
    }

    public function deleteOrder($orderId)
    {
        $cartData = session()->get('cart', []);

        // Find the index of the item with the provided order ID in the cart array
        $index = array_search($orderId, array_column($cartData, 'id'));

        // If the item is found in the cart
        if ($index !== false) {
            // Remove the item from the cart array
            unset($cartData[$index]);
            // Update the cart data in the session
            session(['cart' => array_values($cartData)]); // Re-index the array after removing the item

            notify()->success('Item deleted from cart successfully.');
        } else {
            // Optionally, handle the case where the item with the provided order ID is not found in the cart
            notify()->error('Item not found in cart.');
        }

        return redirect()->back();
    }

    public function viewCart()
    {
        return view('frontend.pages.cart');
    }

    public function checkout()
    {
        
        return view('frontend.pages.checkout');
    }


    public function placeOrder(Request $request)
    {
        //validation

        $cartData = session()->get('cart');
        //insert data into order table
        $order = Order::create([
            //'customer_id' => 1,
            'customer_id'=>auth()->user()->id,
            'transaction_id'=>date('YmdHis'),
            'total_price' => array_sum(array_column($cartData, 'subtotal')),
            'payment_method' => $request->paymentMethod,
        ]);

        //insert cart data into order details table


        foreach ($cartData as $data) {
            OrderDetail::create([
                'order_id' => $order->id,
                'food_id' => $data['id'],
                'unit_price' => $data['price'],
                'quantity' => $data['quantity'],
                'subtotal' => $data['subtotal'],
            ]);
            $food=Menu::find($data['id']);
            $food->decrement('quantity',$data['quantity']);
        }

        session()->forget('cart');
        notify()->success('Order placed successfully.');
        return redirect()->route('home');
    }


       


}
