@extends('backend.master')

@section('content')

<style>
    @media print{
        #print{
            display: none;
        }
    }

    .report-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }
    .card {
        border: none;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }
    .card-body {
        padding: 20px;
    }
    .card-body p {
        font-size: 1.1em;
        color: #333;
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
    .no-data {
        text-align: center;
        font-size: 1.2em;
        color: #777;
    }
</style>

<div class="report-container">
    <h1>Monthly Report</h1>

    @if($topFood)
        <div class="card">
            <div class="card-header">
                <h2>Top Selling Food of the Month</h2>
            </div>
            <div class="card-body">
                <p><strong>Food Name:</strong> {{ $topFood->name }}</p>
                <p><strong>Total Quantity Sold:</strong> {{ $topFood->total_quantity }}</p>
            </div>
        </div>
        <!-- Print Button -->
        <button id="print" onclick="printReport()" class="btn btn-primary mt-3">Print Report</button>
    @else
        <p class="no-data">No sales data available for this month.</p>
    @endif
</div>

<script>
    function printReport() {
        window.print();
    }
</script>

@endsection
