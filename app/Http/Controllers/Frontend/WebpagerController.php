<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Customerlogin;
use App\Models\customerreg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebpagerController extends Controller
{
    public function webpage(){
        return view('frontend.pages.home');//web page

    }

    
        public function aboutus(){
         return view('frontend.pages.aboutus');//about us
        }


        public function menu(){
            $data=Category::take(3)->get();
         return view('frontend.pages.menu',compact('data'));//menu

        }
        public function contact(){
            return view('frontend.pages.contact');//about us
           }





        //reg
        public function formreg(){
            return view('frontend.pages.Customer_reg');
           }

           
           public function reg(Request $request){



            $checkValidation=Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'phone'=>'required|regex:/(01)[0-9]{9}/',
                'address'=>'required',
                'dob'=>'required|date',
               
                'status'=>'required',
               ]);
                    
               if($checkValidation->fails()){
    
                notify()->error($checkValidation->getMessageBag());
                // notify()->error('somethings went wrong');
                return redirect()->back();
               }
               
               $fileNameCustomer='';
        
               if($request->hasFile('image'))  //name of image form
               {
                   //generate name i.e: 20240416170933.jpeg
                   $fileNameCustomer=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
                  
                    //2.3: store it into public folder
                    $request->file('image')->storeAs('/customer',$fileNameCustomer);
                    //public/uploads/category/20244394343.png
       
       
       
               }

        
            Customer::Create([



    
              
                'name'=>$request->name,
                'email'=>strtolower($request->email),
                'password'=>bcrypt($request->password),
                'phoneno'=>$request->phone,
                'address'=>$request->address,
                'dob'=>$request->dob,
                'image'=>$fileNameCustomer,
                'status'=>$request->status,
    
    
            ]);
    
            notify()->success('registration Successfully.');
    
            return redirect()->back();
            
        }


        public function login(){
            return view('frontend.pages.Customer_login');
        }

        
        public function loginsuccess(Request $request){


           //dd($request->all());


           $usterInput=['email'=>$request->email,'password'=>$request->password];
           $checkLogin=auth()->guard('customerGuard')->attempt($usterInput);

           if($checkLogin){
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


        public function logoutsuccess(){
            
            auth('customerGuard')->logout();
            return view('frontend.pages.home');
        }

        public function categorymenu($id){

            $category = Category::with('menu')->find($id);
            // dd($category);
            return view('frontend.pages.category',compact('category'));
        }

    }


