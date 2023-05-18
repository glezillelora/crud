<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>
        body {
            background-color: skyblue;
        }
        table {
            background-color: #c0c0c0;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Students Information</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Add Students</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Students Name</th>
            <th>Students Email</th>
            <th>Students Address</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->address }}</td>
                <td>
                    @if ($company->image)
                        <img src="{{ asset('images/' . $company->image) }}" alt="Company Image" width="100">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}">Show</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

        {!! $companies->links() !!}
    </div>
</body>
</html>