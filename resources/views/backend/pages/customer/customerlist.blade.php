

@extends('backend.master')
@section('content')









<h1>Customer list</h1>
<div>
    <a href="{{route('customer.form')}}" type="button" class="btn btn-success">Edit Customer List</a>
</div>

<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Password</th>
      <th scope="col">Phone Number</th>
      
      <th scope="col">Address</th>
      <th scope="col">DOB</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>


  
  @foreach($data as $Customer)
    <tr>

      <td>{{$Customer->id}}</td>
      <td>{{$Customer->name}}</td>
      <td>{{$Customer->email}}</td>
      <td>{{$Customer->password}}</td>
      <td>{{$Customer->phoneno}}</td>
     
      <td>{{$Customer->address}}</td>
      <td>{{$Customer->dob}}</td>
      <td><img width="70px" src="{{url('/app/image/customer/'.$Customer->image)}}" alt=""></td>
      <td>{{$Customer->status}}</td>
      
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