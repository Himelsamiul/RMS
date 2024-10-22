

@extends('backend.master')
@section('content')









<h1>Create Menu</h1>
<div>
    <a href="{{route('menu.form')}}" type="button" class="btn btn-success" >new menu</a>
</div>
       
<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col" >Name</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">previous Price</th>
      <th scope="col">Description</th>
      
      
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>


  
  @foreach($data as $key=>$menu)

    <tr>
      <th scope="row">{{$key+1}}</th>

     
      <td>{{$menu->name}}</td>
      <td>{{$menu->category->name}}</td>
      <td>{{$menu->price}}.BDT</td>
      <td>{{$menu->previousprice}}.BDT</td>
      <td>{{$menu->description}}</td>    
      
      <td>{{$menu->quantity}}</td>
      <td>
        <img width="70px" src="{{url('/app/image/menu/'.$menu->image)}}" alt="">
      <td>
      <a href="{{route('menu.view',$menu->id)}}" class="btn btn-primary">View</a>

      <a href="{{route('menu.editview',$menu->id)}}" class="btn btn-secondary">Edit</a>
        <a href="{{route('menu.delete',$menu->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
{{$data->links()}}
</div>
























@endsection