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
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'required',
            'dob' => 'required|date',

            'status' => 'required',
        ]);

        if ($checkValidation->fails()) {

            notify()->error($checkValidation->getMessageBag());
            // notify()->error('somethings went wrong');
            return redirect()->back();
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
            'dob' => $request->dob,
            'image' => $fileNameCustomer,
            'status' => $request->status,


        ]);

        notify()->success('registration Successfully.');

        return redirect()->back();
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
        // dd($orderview);
        return view('frontend.pages.profilevieworder', compact('orderview'));
    }

    public function profileview()
    {
        $user = auth()->user();
        // dd($user);
        $orders = Order::with('orderDetails')->where('customer_id', $user->id)->get();
        return view('frontend.pages.profileView', compact('orders', 'user'));
    }

    public function makepayment($id){
        $payment=Order::find($id);
        $this->payment($payment);
        return redirect()->back();

        
    }
    public function payment($payment)
    {
       // dd($payment);
        $post_data = array();
        $post_data['total_amount'] =(int)$payment->total_price ; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $payment->transaction_id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $payment->user_id;
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
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
