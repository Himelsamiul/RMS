

@extends('backend.master')
@section('content')









<h1>Customer list</h1>
<div>
  
</div>

<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      
      <th scope="col">Phone Number</th>
      
      <th scope="col">Address</th>
      
      
      
     
    </tr>
  </thead>
  <tbody>


  
  @foreach($data as $Customer)
    <tr>

      <td>{{$Customer->id}}</td>
      <td>{{$Customer->name}}</td>
      <td>{{$Customer->email}}</td>
      
      <td>0{{$Customer->phoneno}}</td>
     
      <td>{{$Customer->address}}</td>
  
      
      
      
      
    </tr>
    <td>
    <a href="{{route('customer.delete',$Customer->id)}}" class="btn btn-danger">Delete</a>
    </td>
    @endforeach

    
    
  </tbody>
</table>
</div>



{{$data->links()}}

@endsection
