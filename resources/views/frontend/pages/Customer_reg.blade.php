@extends('frontend.webpage')
@section('content')



  
    <style>
        /* Custom CSS */
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .mb-3 {
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
<div class="col-9 pt-4">


<div class="container ">



    <h1 class="text-primary"> Customer Registration</h1>
    <form action="{{route('customer.done')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter customer name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password" placeholder="password">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="number" name="phone" placeholder="Enter phone number">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
        </div>
       
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>

        <div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input class="form-control" type="file" id="image" name="image">
</div>

<div>
  <label for="status">status:</label>
  <input type="text" id="status" name="status" required>
</div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>
</div>







@endsection