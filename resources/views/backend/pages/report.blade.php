@extends('backend.master')

@section('content')

<style>
    @media print {
        #print {
            display: none;
        }
    }

    .report-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f0f8ff; /* Light blue background */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #1e90ff; /* DodgerBlue for main title */
        font-family: 'Arial', sans-serif;
        font-size: 2.5em;
    }

    .card {
        border: none;
        background-color: #ffffff; /* White card background */
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #4682b4; /* SteelBlue header */
        color: #fff;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        font-size: 1.5em;
    }

    .card-body {
        padding: 20px;
        font-family: 'Times New Roman',Georgia;
    }

    .card-body p {
        font-size: 1.2em;
        color: #2f4f4f; /* DarkSlateGray text color */
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        background-color: #4682b4; /* LimeGreen button */
        border: none;
        color: white;
        font-size: 1.2em;
    }

    .btn-primary:hover {
        background-color: #8a111d; /* Darker green on hover */
    }

    .no-data {
        text-align: center;
        font-size: 1.5em;
        color: #dc143c; /* Crimson red for no data */
        margin-top: 20px;
    }

    label {
        font-weight: bold;
        color: #4682b4; /* SteelBlue label text */
    }

    input[type="date"] {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        color: #4682b4;
    }

    /* Animation */
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

    .emoji {
        font-size: 2em; /* Adjust size as needed */
        display: inline-block;
        animation: bounce 1.5s infinite;
    }
</style>

<div class="report-container">
    <h1>Monthly Report</h1>

    <!-- Date Range Filter Form -->
    <form method="GET" action="{{ route('report.list') }}">
        <div class="row">
            <div class="col-md-6">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                       value="{{ old('start_date', $startDate ?? '') }}" required>
                @if($errors->has('start_date'))
                    <small class="text-danger">{{ $errors->first('start_date') }}</small>
                @endif
            </div>

            <div class="col-md-6">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control"
                       value="{{ old('end_date', $endDate ?? '') }}" required>
                @if($errors->has('end_date'))
                    <small class="text-danger">{{ $errors->first('end_date') }}</small>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Filter Report</button>
    </form>

    @if($topFood)
        <div class="card mt-4 {{ $dynamicClass }}">
            <div class="card-header">
                <h2>Top Selling Food of the Selected Period</h2>
            </div>
            <div class="card-body">
                <p><strong>Food Name:</strong> {{ $topFood->name }}</p>
                <p><strong>Total Quantity Sold:</strong> {{ $topFood->total_quantity }}</p>
                <p><strong>Date Range:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} to {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</p>
            </div>
        </div>

        <!-- Print Button -->
        <button id="print" onclick="printReport()" class="btn btn-primary mt-3">Print Report</button>
    @else
        <p class="no-data mt-4">
            <span class="emoji">😔</span> No sales data available for this period.
        </p>
    @endif
</div>

<!-- Audio Elements -->
<audio id="noDataSound" src="{{ asset('Sound/music.wav') }}" preload="auto"></audio>

<script>
    // Function to play sound effect
    function playSound() {
        var sound = document.getElementById('noDataSound');
        sound.play();
    }

    // Play sound effect when no data is available
    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector('.no-data')) {
            playSound();
        }
    });

    function printReport() {
        window.print();
    }
</script>

@endsection
