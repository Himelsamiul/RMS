@extends('backend.master')
@section('content')

<div>
  <h1 style="color: #0033FF">All Order Report</h1>
  <button onclick="printReport()" class="btn btn-primary mt-3">Print</button>

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
@endsection
