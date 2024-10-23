@extends('backend.master')

@section('content')

<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">All Order Report</h1>
    <div class="text-end mb-3">
        <button onclick="printReport()" class="btn btn-info">Print Report</button> <!-- Blue button -->
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light"> <!-- Light background for the header -->
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
            <tbody class="table-light"> <!-- Light blue background for the table body -->
                @foreach($orders as $order)
                    @foreach($order->orderDetails as $detail)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $detail->menu->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($order->total_price, 2) }} TK</td>
                        <td>{{ $order->transaction_id }}</td>
                        <td>{{ ucfirst($order->payment_method) }}</td>
                        <td>{{ ucfirst($order->payment_status) }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pie chart container -->
    <div class="text-center mt-5">
        <h2 class="text-primary">Order Distribution</h2>
        <canvas id="orderChart" style="max-width: 600px; margin: 0 auto;"></canvas>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
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

<style>
    body {
        background-color: #F0F4F8; /* Soft light background */
        color: #333; /* Dark text for readability */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
    }

    .table {
        background-color: #E7F3FF; /* Light blue background for the table */
        border-radius: 8px; /* Rounded corners */
        overflow: hidden; /* Rounded corners effect */
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    .table-light {
        background-color: #E7F3FF; /* Light blue background for the table */
    }

    h1 {
        color: #0033FF; /* Primary color for the heading */
        font-weight: bold; /* Bold heading */
    }

    .btn-info {
        background-color: #17a2b8; /* Blue color for the button */
        border: none; /* Remove border */
    }

    .btn-info:hover {
        background-color: #138496; /* Darker blue on hover */
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1); /* Light blue hover effect */
    }

    @media (max-width: 768px) {
        .table {
            font-size: 14px; /* Smaller font size on mobile */
        }
    }
</style>

@endsection
