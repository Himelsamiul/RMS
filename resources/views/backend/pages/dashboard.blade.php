@extends('backend.master')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        /* Common card styling */
        .dashboard-box {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
            border: 1px solid #dddddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .dashboard-box:hover {
            transform: translateY(-10px); /* Elevate slightly on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        /* Unique colors for each card */
        .dashboard-box.user-card {
            background-color: rgba(255, 99, 132, 0.8); /* Semi-transparent Red */
        }

        .dashboard-box.category-card {
            background-color: rgba(54, 162, 235, 0.8); /* Semi-transparent Blue */
        }

        .dashboard-box.menu-card {
            background-color: rgba(255, 206, 86, 0.8); /* Semi-transparent Yellow */
        }

        .dashboard-box.order-card {
            background-color: rgba(75, 192, 192, 0.8); /* Semi-transparent Green */
        }

        .dashboard-title {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333333;
        }

        .dashboard-content {
            font-size: 18px;
            color: #666666;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .digital-clock {
            font-size: 2em;
            text-align: center;
            font-weight: bold;
            background: #333;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box user-card">
                    <h4 class="dashboard-title">{{ $customer }}</h4>
                    <p class="dashboard-content">Total User</p>
                    <a href="{{ route('customer.list') }}" class="btn-primary">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box category-card">
                    <h4 class="dashboard-title">{{ $category }}</h4>
                    <p class="dashboard-content">Total Category</p>
                    <a href="{{ route('category.list') }}" class="btn-primary">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box menu-card">
                    <h4 class="dashboard-title">{{ $menu }}</h4>
                    <p class="dashboard-content">Total Menu</p>
                    <a href="{{ route('menu.list') }}" class="btn-primary">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box order-card">
                    <h4 class="dashboard-title">{{ $order }}</h4>
                    <p class="dashboard-content">Total Order</p>
                    <a href="{{ route('order.list') }}" class="btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <!-- Digital Clock Section -->
        <div class="digital-clock" id="digitalClock">
            <!-- Time will be inserted here by JavaScript -->
        </div>

        <!-- Order List and Pie Chart -->
        <div>
            <h1 style="color: #0033FF">All Order Report</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Transaction ID</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th>Shipping Address</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @foreach($order->orderDetails as $detail)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $detail->menu->name }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->transaction_id }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <div style="width: 50%; margin-top: 30px;">
                <canvas id="orderChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateDigitalClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('digitalClock').textContent = `${hours}:${minutes}:${seconds}`;
            }

            updateDigitalClock();
            setInterval(updateDigitalClock, 1000);
        });

        const labels = @json($labels);
        const data = @json($data);

        const chartData = {
            labels: labels,
            datasets: [{
                label: 'Order Distribution',
                data: data,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#FF9F40'],
                borderColor: '#fff',
                borderWidth: 1
            }]
        };

        const config = {
            type: 'pie',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        };

        window.onload = function() {
            const ctx = document.getElementById('orderChart').getContext('2d');
            new Chart(ctx, config);
        };
    </script>
</body>

</html>

@endsection
