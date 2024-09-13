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
                                        class="fw-bold">Phone No:</span> 0{{ auth()->user()->phoneno }} </li>

                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Address:</span> {{ $order->address }} </li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Menu Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($orderview as $data)
                                    <tr>
                                        <td>{{ $data->menu->name }}</td>
                                        <td>{{ $data->unit_price }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ $data->subtotal }}</td>
                                    </tr>
                                    @php
                                        $total += $data->subtotal;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Discount Section -->
                        <div class="row">
                            <div class="col-md-6 text-end">
                                <strong>Discount:</strong>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $order->discount }} BDT</p>
                            </div>
                        </div>

                        <!-- Final Total Price -->
                        <div class="row">
                            <div class="col-md-6 text-end">
                                <strong>Total (After Discount):</strong>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $total - $order->discount }} BDT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection
