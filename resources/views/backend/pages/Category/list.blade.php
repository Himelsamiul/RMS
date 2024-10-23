@extends('backend.master')

@section('content')

<h1>Create Category</h1>
<div>
    <a href="{{ route('category.form') }}" type="button" class="btn btn-success">Create New Category</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($data as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <img class="category-image" src="{{ url('/app/image/category/' . $category->image) }}" alt="{{ $category->name }}">
                </td>
                <td>
                    <a href="{{ route('category.view', $category->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('category.editview', $category->id) }}" class="btn btn-secondary">Edit</a>
                    <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
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

    .category-image {
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
            const confirmed = confirm('Are you sure you want to delete this category?');
            if (!confirmed) {
                e.preventDefault(); // Prevent the default action if not confirmed
            }
        });
    });
</script>

@endsection
