<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $customer = Customer::count();
        $category = Category::count();
        $menu = Menu::count();
        $order = Order::count();
        return view('backend.pages.dashboard', compact('customer', 'category', 'menu', 'order'));
    }


    public function login()
    {

        return view('backend.pages.login');
    }


    public function doLogin(Request $request)
    {
        //dd($request->all());

        $credentials = $request->except('_token');

        $login = auth()->attempt($credentials);
        if ($login) {


            notify()->success('login successful');
            return redirect()->route('dashboard');
        }

        notify()->error('invalid');
        return redirect()->back();
    }
    public function signout()
    {
        auth()->logout();
        notify()->success('Logout successful');
        return view('backend.pages.login');
    }

    public function orderlist()
    {
        $orders = Order::with('orderDetails.menu')->get();
        
        // Get unique food names for labels
        $labels = $orders->flatMap(function($order) {
            return $order->orderDetails->pluck('menu.name');
        })->unique();
        
        // Prepare data for the chart
        $data = $labels->map(function($label) use ($orders) {
            return $orders->flatMap(function($order) use ($label) {
                return $order->orderDetails->where('menu.name', $label)->pluck('quantity');
            })->sum();
        });
    
        return view('backend.pages.orderlist', compact('orders', 'labels', 'data'));
    }
    
    
}