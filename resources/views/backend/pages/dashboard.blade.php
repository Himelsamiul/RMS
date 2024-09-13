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
            background-color: #f4f7f6; /* Light grey background */
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        .dashboard-box {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dashboard-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .dashboard-title, .dashboard-content {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333333;
            position: relative;
            animation: bounceText 2s infinite;
        }

        .dashboard-content {
            font-size: 18px;
            color: #666666;
        }

        .text-red {
            color: #e53935;
        }

        .bg-green-light {
            background-color: #dcedc8;
            border-color: #a5d6a7;
        }

        .bg-red-light {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .bg-warning-light {
            background-color: #fff3cd;
            border-color: #ffeeba;
        }

        .card-footer {
            border-top: 1px solid #dddddd;
            padding: 15px;
            background-color: #f9f9f9;
        }

        .card-footer:hover {
            background-color: #f1f1f1;
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

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        @keyframes bounceText {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            25% {
                transform: translateY(-10px);
            }
            75% {
                transform: translateY(10px);
            }
        }

        .emoji {
            font-size: 2em;
            display: inline-block;
            animation: bounce 1s infinite;
        }

        .digital-clock {
            font-size: 2em;
            text-align: center;
            font-weight: bold;
            background: #333;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box bg-red-light">
                    <h4 class="dashboard-title text-red">{{ $customer }}</h4>
                    <p class="dashboard-content">Total User</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('customer.list') }}" class="btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box bg-green-light">
                    <h4 class="dashboard-title text-red">{{ $category }}</h4>
                    <p class="dashboard-content">Total Category</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('category.list') }}" class="btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box bg-warning-light">
                    <h4 class="dashboard-title text-red">{{ $menu }}</h4>
                    <p class="dashboard-content">Total Menu</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('menu.list') }}" class="btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box bg-warning-light">
                    <h4 class="dashboard-title text-red">{{ $order }}</h4>
                    <p class="dashboard-content">Total Order</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('order.list') }}" class="btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emoji Section -->
        <div class="emoji-section text-center">
            <p class="emoji">🎉</p>
            <p class="emoji">🚀</p>
            <p class="emoji">✨</p>
        </div>

        <!-- Digital Clock Section -->
        <div class="digital-clock" id="digitalClock">
            <!-- Time will be inserted here by JavaScript -->
        </div>

        <!-- Include the order list view -->
        <div>
            <h1 style="color: #0033FF">All Order Report</h1>
         

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Shipping Address</th>
                        <th scope="col">Order Date</th>
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

            <!-- Pie chart container -->
            <div style="width: 50%; margin-top: 30px;">
                <canvas id="orderChart"></canvas>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to update the digital clock
            function updateDigitalClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('digitalClock').textContent = `${hours}:${minutes}:${seconds}`;
            }

            // Initial clock setup
            updateDigitalClock();
            setInterval(updateDigitalClock, 1000);
        });

        // Data for the pie chart
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

        function printReport() {
            window.print();
        }
    </script>
</body>

</html>

@endsection
