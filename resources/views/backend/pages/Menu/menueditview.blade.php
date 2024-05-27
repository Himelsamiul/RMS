@extends('backend.master')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    /* Basic CSS styling for the form */
    form {
        max-width: 500px;
        margin: 0 auto;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>


<form action="{{ route('menu.edit.update',$menudetails->id)}}" method="post"  enctype="multipart/form-data">
@method('put')   
@csrf
<div>
<h1 class="text-primary">Menu</h1>
</div>
  <label for="name">name</label>
  <input type="text" id="name" name="name" required>

 
  <div class="form-group">
      <label for="">Menu Category</label>
      <select class="form-control" name="category_id" id="">
      @foreach ($categories as $data)
        <option value="{{$data->id}} "> 
          {{$data->name}}</option>
      @endforeach
      

    </select>

    </div>
 

  <label for="price">Price:</label>
  <input type="number" id="price" name="price" required>

  <label for="description">description:</label>
  <input type="text" id="description" name="description" required placeholder="">


  <label for="status">status:</label>
  <input type="text" id="status" name="status" required>


  <label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" required>


  <label for="iamge">Image:</label>
  <input type="file" id="image" name="image">



  <input type="submit" value="Submit">
</form>

</body>
</html>
@endsection