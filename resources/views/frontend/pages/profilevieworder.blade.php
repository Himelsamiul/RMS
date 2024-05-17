@extends('frontend.webpage')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 200px;">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-baseline justify-content-end">
                        <div class="col-xl-9">
                            <p style="color: #7e8d9f;font-size: 20px;">PaySlip >> <strong></strong></p>
                        </div>
                        <div class="col-xl-3 float-end">
                            <button onclick="printContent('printDiv')" class="btn btn-light text-capitalize border-0"
                                data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</button>
                        </div>
                        <hr>
                    </div>
                    <h1 class="card-title">Details</h1>
                    <div id="printDiv">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Name:</span> {{ auth()->user()->name }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Phone:</span> {{ auth()->user()->email }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Phone No:</span> {{ auth()->user()->phoneno }} </li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Phone No:</span> {{ auth()->user()->address }} </li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer id</th>
                                        <th>menu name</th>
                                        <th>Unit price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderview as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->menu->name }}</td>
                                        <td>{{ $data->unit_price }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ $data->subtotal }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('yourJsCode')

<script type="text/javascript">
    function printContent(el){
          var restorepage = $('body').html();
          var printcontent = $('#' + el).clone();
          $('body').empty().html(printcontent);
          window.print();
          $('body').html(restorepage);
      }

</script>
@endpush
