<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{

    public function list(){
        $data=Menu::paginate(5);  
        
        return view('backend.pages.menu.menulist',compact('data'));
    }
    

    public function form(){
     
        $Categories=Menu::with('category')->get();

        return view('backend.pages.menu.menuform',compact('Categories'));
    }


    public function store(Request $request){

        $checkValidation=Validator::make($request->all(),[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|gt:1',
            'description'=>'required',
            'status'=>'required',
            'quantity'=>'required',
            
        ]);

        if($checkValidation->fails()){

            notify()->error($checkValidation->getMessageBag());
            // notify()->error('somethings went wrong');
            return redirect()->back();

           
           }//validation end



           //image storing start

            $fileNameMenu='';
        
        if($request->hasFile('image'))  //name of image form
        {
            //generate name i.e: 20240416170933.jpeg
            $fileNameMenu=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
           
             //2.3: store it into public folder
             $request->file('image')->storeAs('/menu',$fileNameMenu);
             //public/uploads/category/20244394343.png



        }


        Menu::Create([

          
            'name'=>$request->name,
            'categoryid'=>$request->category_id,
            'price'=>$request->price,
            'description'=>$request->description,
            'status'=>$request->status,
            'quantity'=>$request->quantity,
            'image'=>$fileNameMenu,
    
          
        ]);

        notify()->success('menu Created Successfully.');

        return redirect()->route('menu.form');
    }
    
}


