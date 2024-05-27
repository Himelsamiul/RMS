<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list(){


        $data=Category::paginate(5);   
        return view('backend.pages.category.list',compact('data'));
    }
    
    
    
    
    
    
    
    public function form(){

        return view('backend.pages.category.form');
    }
    


    public function store(Request $request){


        $checkValidation=Validator::make($request->all(),[
           'name'=>'required',
           'description'=>'required',
           //'quantity'=>'required|gt:0',
           

        ]);

        if($checkValidation->fails()){

            notify()->error($checkValidation->getMessageBag());
            // notify()->error('somethings went wrong');
            return redirect()->back();

           
           }//validation end
  


        $fileName='';
        
        if($request->hasFile('image'))  //name of image form
        {
            //generate name i.e: 20240416170933.jpeg
            $fileName=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
           
             //2.3: store it into public folder
             $request->file('image')->storeAs('/category',$fileName);
             //public/uploads/category/20244394343.png



        }

        Category::create([


            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$fileName,
            //'quantity'=>$request->quantity,
            
      
        ]);

        notify()->success('category Created Successfully.');

     return redirect()->route('category.form');
}

public function categoryDelete($c_id)
{

// Category::find($c_id)->delete();

  $category=Category::find($c_id);
  $category->delete();

  notify()->success('Category deleted successfully.');
  return redirect()->back();
}






public function categoryeditview($id){
    
    $catdetails=Category::find($id);
    
    return view('backend.pages.category.categoryedit',compact('catdetails'));

}




  public function categoryupdate(Request $request,$id){
   $catdetails=Category::find($id);

   $checkValidation=Validator::make($request->all(),[
    'name'=>'required',
    'description'=>'required',
    //'quantity'=>'required|gt:0',
    

 ]);

 if($checkValidation->fails()){

     notify()->error($checkValidation->getMessageBag());
     // notify()->error('somethings went wrong');
     return redirect()->back();

    
    }//validation end

    
    $fileName='';
        
    if($request->hasFile('image'))  //name of image form
    {
        //generate name i.e: 20240416170933.jpeg
        $fileName=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
        File::delete('app/image/category/'. $catdetails->image);

         //2.3: store it into public folder
         $request->file('image')->storeAs('/category',$fileName);
         //public/uploads/category/20244394343.png
    }

   $catdetails->update([

    'name'=>$request->name,
    'description'=>$request->description,
    'image'=>$fileName,
    //'quantity'=>$request->quantity,
    
]);
    notify()->success('update successful');
   return redirect()->route('category.list');
  }

  public function categoryview($id){

    $catview=Category::find($id);
    // dd($catview);
    return view('backend.pages.category.view',compact('catview'));

  }
}