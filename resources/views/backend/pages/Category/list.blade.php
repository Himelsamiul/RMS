@extends('backend.master')
@section('content')

<h1>Create Category</h1>
<div>
    <a href="{{route('category.form')}}" type="button" class="btn btn-success">Create New Category</a>
</div>

<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
    
     
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($data as $category)
    <tr>

      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>
      <td>{{$category->description}}</td>
  
      <td>
        <img width="70px" src="{{url('/app/image/category/'.$category->image)}}" alt="">
      </td>

      <td>
        <a href="{{route('category.view',$category->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('category.editview',$category->id)}}" class="btn btn-secondary">Edit</a>
        <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
{{$data->links()}}
</div>




@endsection