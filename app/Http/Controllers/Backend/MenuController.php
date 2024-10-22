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
     
        
        //
        $categories=Category::all();

        return view('backend.pages.menu.menuform',compact('categories'));
    }


    public function store(Request $request){

        $checkValidation=Validator::make($request->all(),[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|gt:1',
            'previousprice'=>'nullable|gt:1',
            'description'=>'required',
           
            'quantity'=>'required|gt:0',
            
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
            'previousprice'=>$request->previousprice,
            'description'=>$request->description,
            
            'quantity'=>$request->quantity,
            'image'=>$fileNameMenu,
    
          
        ]);


        

        notify()->success('menu Created Successfully.');

        return redirect()->route('menu.form');



    }


    
    public function menudelete($m_id){

        // Category::find($c_id)->delete();
        
          $menu=Menu::find($m_id);
          $menu->delete();
        
          notify()->success('Category deleted successfully.');
          return redirect()->back();
        }
        

        public function menueditview($id){
    
            $menudetails=Menu::find($id);
            
            return view('backend.pages.menu.menueditview',compact('menudetails'));
            
        
        }



        public function menuupdate(Request $request,$id){
            $menudetails=Menu::find($id);
         
            $checkValidation=Validator::make($request->all(),[
                'name'=>'required',
                'category_id'=>'required',
                'price'=>'required|gt:1',
                'description'=>'required',
              
                'quantity'=>'required|gt:0',
          ]);
         
          if($checkValidation->fails()){
         
              notify()->error($checkValidation->getMessageBag());
              // notify()->error('somethings went wrong');
              return redirect()->back();
         
             
             }//validation end
         
             $fileNameMenu='';
        
        if($request->hasFile('image'))  //name of image form
        {
            //generate name i.e: 20240416170933.jpeg
            $fileNameMenu=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
           
             //2.3: store it into public folder
             $request->file('image')->storeAs('/menu',$fileNameMenu);
             //public/uploads/category/20244394343.png



        }
            $menudetails->update([
         
             'name'=>$request->name,
             'categoryid'=>$request->category_id,
            'price'=>$request->price,
            'description'=>$request->description,
            
            'quantity'=>$request->quantity,
            'image'=>$fileNameMenu,
             
         ]);
             notify()->success('update successful');
            return redirect()->route('menu.list');
           }



           

        public function menuview($id){

            $menuview=Menu::find($id);
            // dd($catview);
            return view('backend.pages.menu.menuview',compact('menuview'));
        
          }
        
        
        
            
    
}


