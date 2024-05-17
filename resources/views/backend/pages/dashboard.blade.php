@extends('backend.master')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<style>
    /* Basic CSS styling for the dashboard */
    .dashboard-box {
        background-color: #ffffff; /* White background */
        border: 1px solid #dddddd; /* Light gray border */
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }
    .dashboard-title {
        font-size: 20px;
        margin-bottom: 10px;
        color: #333333; /* Dark gray text color */
    }
    .dashboard-content {
        font-size: 16px;
        color: #666666; /* Medium gray text color */
    }
    /* Colors for the dashboard boxes */
    .monthly-report-box {
        background-color: #f0f7f4; /* Light green background */
        border-color: #b1d6c6; /* Green border */
    }
    .active-orders-box {
        background-color: #f9e6e6; /* Light red background */
        border-color: #f0b3b3; /* Red border */
    }
</style>
</head>
<body>
<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card text-white bg-primary">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold">Users</div>
          <div>{{$customer}}</div>
        </div>
      </div>
    </div>
  </div>
</div>





</body>
</html>





@endsection
