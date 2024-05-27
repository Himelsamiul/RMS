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


<form action="{{ route('category.form')}}" method="post" enctype="multipart/form-data">
    @csrf
<div>
<h1 class="text-primary">Category</h1>
</div>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="description">Description:</label>
  <input type="text" id="description" name="description" required>

 

  
  

  <label for="image">Image URL:</label>
  <input type="file" id="image" name="image"><br><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>
@endsection