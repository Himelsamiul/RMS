@extends('backend.master')
@section('content')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    img {
        display: block;
        max-width: 20%;
        height: auto;
    }
</style>

<h1>Details</h1>

<table>
    <tr>
        <th>ID</th>
        <td>{{ $menuview->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $menuview->name }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{ $menuview->description }}</td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td>{{ $menuview->quantity }}</td>
    </tr>
    <tr>
        <th>Image</th>
        <td><img src="{{ url('/app/image/menu', $menuview->image) }}" alt=""></td>
    </tr>
</table>

@endsection
