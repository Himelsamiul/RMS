<?php

namespace App\Http\Controllers\Frontend;

use Throwable;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;

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
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('frontend.pages.cart', ['cartIsEmpty' => true]);
        }
        return view('frontend.pages.cart', ['cartIsEmpty' => false, 'cart' => $cart]);

    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');
        $cartId = $request->input('cartId');
        $newQuantity = $request->input('quantity');

        if (isset($cart[$cartId])) {
            $cart[$cartId]['quantity'] = $newQuantity;
            $cart[$cartId]['subtotal'] = $cart[$cartId]['price'] * $newQuantity;
            session()->put('cart', $cart);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function clearCart()
    {
        session()->forget('cart');
        notify()->success('Cart clear successfully.');
        return redirect()->back();
    }

    public function checkout()
    {
        return view('frontend.pages.checkout');
    }


    public function placeOrder(Request $request)
    {
        // dd($request->all());
        //validation
        try {
            $cartData = session()->get('cart');
            //insert data into order table
            $order = Order::create([
                //'customer_id' => 1,
                'customer_id' => auth()->user()->id,
                'transaction_id' => date('YmdHis'),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'transaction_id' => date('YmdHis'),
                'total_price' => array_sum(array_column($cartData, 'subtotal')),
                'payment_method' => $request->paymentMethod,
                'status' => 'pending',
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
                $food = Menu::find($data['id']);
                $food->decrement('quantity', $data['quantity']);
            }

            session()->forget('cart');

            if ($request->paymentMethod == 'ssl') {
                $this->payNow($order);
            }
            notify()->success('Order placed successfully.');
            return redirect()->route('profile.view');
        } catch (Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    public function payNow($order)
    {
        //    dd($order);
        $post_data = array();
        $post_data['total_amount'] = (int)$order->total_price; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $order->transaction_id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->name;
        $post_data['cus_email'] = $order->email;
        $post_data['cus_add1'] = $order->address;;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";



        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
}
