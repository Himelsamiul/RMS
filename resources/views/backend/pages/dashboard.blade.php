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
            position: relative; /* Needed for absolute positioning of animated text */
            overflow: hidden; /* To ensure animation stays within box */
        }

        .dashboard-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .dashboard-title, .dashboard-content {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333333; /* Dark grey text color */
            position: relative;
            animation: bounceText 2s infinite;
        }

        .dashboard-content {
            font-size: 18px;
            color: #666666; /* Medium grey text color */
        }

        .text-red {
            color: #e53935; /* Red color for emphasis */
        }

        .bg-green-light {
            background-color: #dcedc8; /* Light green background */
            border-color: #a5d6a7; /* Green border */
        }

        .bg-red-light {
            background-color: #f8d7da; /* Light red background */
            border-color: #f5c6cb; /* Red border */
        }

        .bg-warning-light {
            background-color: #fff3cd; /* Light yellow background */
            border-color: #ffeeba; /* Yellow border */
        }

        .card-footer {
            border-top: 1px solid #dddddd;
            padding: 15px;
            background-color: #f9f9f9; /* Light grey background for footer */
        }

        .card-footer:hover {
            background-color: #f1f1f1; /* Slightly darker grey on hover */
        }

        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Animation for emojis */
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

        .chart-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; /* White background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Digital Clock Styling */
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
                        <img src="" alt="" class="img-fluid custom-small-img">
                        <a href="{{ route('customer.list') }}" class="btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box bg-green-light">
                    <h4 class="dashboard-title text-red">{{ $category }}</h4>
                    <p class="dashboard-content">Total Category</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <img src="" alt="" class="img-fluid custom-small-img">
                        <a href="{{ route('category.list') }}" class="btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box bg-warning-light">
                    <h4 class="dashboard-title text-red">{{ $menu }}</h4>
                    <p class="dashboard-content">Total Menu</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <img src="" alt="" class="img-fluid custom-small-img">
                        <a href="{{ route('menu.list') }}" class="btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box bg-warning-light">
                    <h4 class="dashboard-title text-red">{{ $order }}</h4>
                    <p class="dashboard-content">Total Order</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <img src="" alt="" class="img-fluid custom-small-img">
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

        <!-- Chart Section -->
        <div class="chart-container">
            <h2>Monthly Sales Report</h2>
            <canvas id="salesChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="{{ asset('node_modules/chart.js/dist/chart.min.js') }}"></script>
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

            // Chart.js code for monthly sales report
            var ctx = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Replace with your data labels
                    datasets: [{
                        label: 'Monthly Sales',
                        data: [12, 19, 3, 5, 2, 3], // Replace with your data values
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>

@endsection
