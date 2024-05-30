<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Category;
use App\Models\Customer;
use App\Models\customerreg;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Customerlogin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Contact;

class WebpagerController extends Controller
{
    public function webpage()
    {
        return view('frontend.pages.home'); //web page

    }


    public function aboutus()
    {
        return view('frontend.pages.aboutus'); //about us
    }


    public function menu()
    {
        $data = Category::take(3)->get();
        return view('frontend.pages.menu', compact('data')); //menu

    }
    public function contact()
    {
        return view('frontend.pages.contact'); //about us
    }





    //reg
    public function formreg()
    {
        return view('frontend.pages.Customer_reg');
    }





    public function reg(Request $request)
    {



        $checkValidation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required|regex:/^(01)[3-9]\d{8}$/',
            'address' => 'required',



        ]);

        if ($checkValidation->fails()) {
            if ($checkValidation->errors()->has('email')) {
                notify()->error('The email has already been taken.');
            }else {
                // Notify the user about other validation errors
                notify()->error('Something went wrong.');
            }
            // notify()->error($checkValidation->getMessageBag());
            // notify()->error('somethings went wrong');
            return redirect()->back()->with('myError', $checkValidation->getMessageBag());
        }

        $fileNameCustomer = '';

        if ($request->hasFile('image'))  //name of image form
        {
            //generate name i.e: 20240416170933.jpeg
            $fileNameCustomer = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();

            //2.3: store it into public folder
            $request->file('image')->storeAs('/customer', $fileNameCustomer);
            //public/uploads/category/20244394343.png



        }


        Customer::Create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
            'phoneno' => $request->phone,
            'address' => $request->address,
            'image' => $fileNameCustomer,
        ]);

        notify()->success('registration Successfully.');

        return redirect()->route('customer.login');
    }


    public function login()
    {
        return view('frontend.pages.Customer_login');
    }


    public function loginsuccess(Request $request)
    {


        //dd($request->all());


        $usterInput = ['email' => $request->email, 'password' => $request->password];
        $checkLogin = auth()->guard('customerGuard')->attempt($usterInput);

        if ($checkLogin) {
            //dd("login done");

            notify()->success('Login successfull');

            return redirect()->route('home');
        }



        // dd("login done");
        notify()->error('invalid user');
        return redirect()->back();










        //notify()->success('customer login Successfully.');

        // return redirect()->route('customer.login');



    }


    public function logoutsuccess()
    {

        auth('customerGuard')->logout();
        return view('frontend.pages.home');
    }

    public function categorymenu($id)
    {

        $category = Category::with('menu')->find($id);
        // dd($category);
        return view('frontend.pages.category', compact('category'));
    }



    public function profilevieworder($id)
    {
        $orderview = OrderDetail::with('menu')->where('order_id', $id)->get();
        $order = Order::find($id); // Retrieve the specific order by ID
        return view('frontend.pages.profilevieworder', compact('orderview', 'order'));
    }
    

    public function profileview()
    {
        $user = auth()->user();
        // dd($user);
        $orders = Order::with('orderDetails')->where('customer_id', $user->id)->get();
        return view('frontend.pages.profileView', compact('orders', 'user'));
    }
}
