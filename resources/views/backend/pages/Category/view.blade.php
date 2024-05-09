@extends('backend.master')
@section('content')


<h1>Details</h1>

<table>
<p>ID: {{ $catview->id}}</p>
</table>
<p>Name: {{ $catview->name}}</p>
<p>Description:{{ $catview->description}}</p>
<p>Quantity: {{ $catview->quantity}}</p>
<p>Image:</p> <img width="100" src="{{url('/app/image/category', $catview->image)}}" alt="">


@endsection