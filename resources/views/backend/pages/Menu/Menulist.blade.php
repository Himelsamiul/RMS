@extends('backend.master')

@section('content')

<h1>Create Menu</h1>
<div>
    <a href="{{ route('menu.form') }}" type="button" class="btn btn-success">New Menu</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Previous Price</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $menu)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->category->name }}</td>
                    <td>{{ $menu->price }} BDT</td>
                    <td>{{ $menu->previousprice }} BDT</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->quantity }}</td>
                    <td>
                        <img class="menu-image" src="{{ url('/app/image/menu/' . $menu->image) }}" alt="{{ $menu->name }}">
                    </td>
                    <td>
                        <a href="{{ route('menu.view', $menu->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('menu.editview', $menu->id) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('menu.delete', $menu->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>

<style>
    body {
        background-color: #00BFFF; /* Light blue background */
        color: #000000; /* Black text */
        font-family: 'Arial', sans-serif; /* Font type */
    }

    h1 {
        margin-bottom: 20px;
        font-size: 2em; /* Larger heading */
        text-align: center;
    }

    .table {
        background-color: #B0E0E6; /* Table background color (light blue) */
        border-radius: 10px;
        overflow: hidden; /* Rounded corners */
    }

    th {
        background-color: #87CEEB; /* Header background color (lighter blue) */
        color: #000000; /* Header text color */
    }

    td {
        color: #000000; /* Table cell text color */
    }

    .menu-image {
        width: 70px;
        height: auto;
        border-radius: 5px; /* Rounded image */
    }

    .btn {
        margin-right: 5px; /* Space between buttons */
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.1); /* Row hover effect */
    }

    @media (max-width: 768px) {
        .table {
            font-size: 14px; /* Smaller font size on mobile */
        }
    }
</style>

<script>
    // JavaScript function to handle confirm delete action
    document.querySelectorAll('.btn-danger').forEach(button => {
        button.addEventListener('click', function (e) {
            const confirmed = confirm('Are you sure you want to delete this item?');
            if (!confirmed) {
                e.preventDefault(); // Prevent the default action if not confirmed
            }
        });
    });
</script>
@endsection
