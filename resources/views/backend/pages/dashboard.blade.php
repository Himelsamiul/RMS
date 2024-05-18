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
            background-color: #ffffff;
            /* White background */
            border: 1px solid #dddddd;
            /* Light gray border */
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .dashboard-title {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333333;
            /* Dark gray text color */
        }

        .dashboard-content {
            font-size: 16px;
            color: #666666;
            /* Medium gray text color */
        }

        /* Colors for the dashboard boxes */
        .monthly-report-box {
            background-color: #f0f7f4;
            /* Light green background */
            border-color: #b1d6c6;
            /* Green border */
        }

        .active-orders-box {
            background-color: #f9e6e6;
            /* Light red background */
            border-color: #f0b3b3;
            /* Red border */
        }
    </style>
</head>

<body>
    <div class="row mb-3">
        <div class="col-sm-6 col-lg-3 mb-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-red">{{ $customer }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Total User</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('customer.list') }}">
                    <div class="card-footer py-3 bg-red-light">
                        <div class="row align-items-center text-red">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-red">{{ $category }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Total Category</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('category.list') }}">
                    <div class="card-footer py-3 bg-green-light">
                        <div class="row align-items-center text-red">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-red">{{ $menu }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Total Menu</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('menu.list') }}">
                    <div class="card-footer py-3 bg-warning-light">
                        <div class="row align-items-center text-red">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-red">{{ $order }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Total order</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="">
                    <div class="card-footer py-3 bg-warning-light">
                        <div class="row align-items-center text-red">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
