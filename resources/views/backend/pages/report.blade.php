@extends('backend.master')
@section('content')

<div>
    <a href="" type="button" class="btn btn-dark">Print</a>
    <div class="col-xl-3 float-end">
                            <button onclick="printContent('printDiv')" class="btn btn-light text-capitalize border-0"
                                data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</button>
                        </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Food Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Top Selling Food</th>
    </tr>
  </thead>
  <tbody>

 
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
   

  </tbody>
</table>
@endsection