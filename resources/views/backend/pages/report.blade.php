@extends('backend.master')

@section('content')

    <div class="container">
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
            <button onclick="printReport()" class="btn btn-primary mt-3">Print Report</button>
        @else
            <p>No sales data available for this month.</p>
        @endif
    </div>

    <script>
        function printReport() {
            window.print();
        }
    </script>
@endsection
