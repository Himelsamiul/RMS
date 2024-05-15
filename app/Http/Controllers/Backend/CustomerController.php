<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\customerreg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function list(){ 
        $data=Customer::paginate(5);  
        return view('backend.pages.customer.customerlist',compact('data'));
    
        } 

    public function form(){
    return view('backend.pages.customer.customerform');

    } 


    public function store(Request $request){

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
               
            
    
            Customer::Create([
    
              
                'name'=>$request->name,
                'email'=>strtolower($request->email),
                'password'=>bcrypt($request->password),
                'phoneno'=>$request->phone,
                'address'=>$request->address,
                'dob'=>$request->dob,
                'image'=>$request->image,
                'status'=>$request->status,
    
    
            ]);
    
            notify()->success('customer Created Successfully.');
    
            return redirect()->route('customer.form');
            
        }
    
    
        public function delete($customer_id){
    
            // Category::find($c_id)->delete();
            
              $Customer=Customer::find($customer_id);
              $Customer->delete();
            
              notify()->success('Customer deleted successfully.');
              return redirect()->back();
            }
            
        
}
