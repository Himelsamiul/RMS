@extends('backend.master')
@section('content')


<h1>Details</h1>

<table>
<p>ID: {{ $menuview->id}}</p>
</table>
<p>Name: {{ $menuview->name}}</p>
<p>Description:{{ $menuview->description}}</p>
<p>Quantity: {{ $menuview->quantity}}</p>
<p>Image:</p> <img width="100" src="{{url('/app/image/menu', $menuview->image)}}" alt="">


@endsection