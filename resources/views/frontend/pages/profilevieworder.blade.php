@extends('frontend.webpage')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 200px;">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Details</h1>
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
@endsection