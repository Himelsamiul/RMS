@extends('backend.master')

@section('content')

<h1>Customer List</h1>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($data as $Customer)
            <tr>
                <td>{{ $Customer->id }}</td>
                <td>{{ $Customer->name }}</td>
                <td>{{ $Customer->email }}</td>
                <td>0{{ $Customer->phoneno }}</td>
                <td>{{ $Customer->address }}</td>
                <td>
                    <a href="{{ route('customer.delete', $Customer->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $data->links() }}
</div>

<style>
    body {
        background-color: #E0F7FA; /* Light cyan background */
        color: #000000; /* Black text */
        font-family: 'Arial', sans-serif; /* Font type */
    }

    h1 {
        margin-bottom: 20px;
        font-size: 2em; /* Larger heading */
        text-align: center;
        color: #00796B; /* Dark teal heading */
    }

    .table {
        background-color: #FFFFFF; /* Table background color */
        border-radius: 10px; /* Rounded corners */
        overflow: hidden; /* Rounded corners effect */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    th {
        background-color: #00796B; /* Header background color */
        color: #FFFFFF; /* Header text color */
    }

    td {
        color: #000000; /* Table cell text color */
    }

    .btn {
        margin-right: 5px; /* Space between buttons */
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 121, 107, 0.1); /* Row hover effect */
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
            const confirmed = confirm('Are you sure you want to delete this customer?');
            if (!confirmed) {
                e.preventDefault(); // Prevent the default action if not confirmed
            }
        });
    });
</script>

@endsection
