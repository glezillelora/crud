<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: skyblue;
        }
        table {
            background-color: #c0c0c0;
            color: white;
        }
        .eye-icon {
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            color: blue;
        }
        .image-container {
            display: none;
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStudentModal">
                        <i class="fas fa-plus"></i> Add Students
                    </button>
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
                            <span class="eye-icon" onclick="toggleImage(this)">
                                <i class="fas fa-eye"></i>
                            </span>
                            <div class="image-container">
                                @if ($company->image)
                                    <img src="{{ asset('images/' . $company->image) }}" alt="Company Image" width="100">
                                @else
                                    No Image
                                @endif
                            </div>
                        </td>
                        <td>
                            <form id="delete-form-{{ $company->id }}" action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                <a class="btn btn-success" title="Edit" href="{{ route('companies.edit', $company->id) }}">
                                    <i class="fas fa-edit"></i>Edit
                                </a>
                                <a class="btn btn-info" title="Show" href="{{ route('companies.show', $company->id) }}">
                                    <i class="fas fa-eye"></i>Show
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="button" title="Delete" class="btn btn-danger" onclick="confirmDelete({{ $company->id }})">
                                    <i class="fas fa-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $companies->links() !!}
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Student Name:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Student Name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Student Email:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Student Email">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Student Address:</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Student Address">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Student Image:</label>
                            <input type="file" name="image" accept="image/*" class="form-control" id="image">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right;">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleImage(icon) {
            var imageContainer = icon.nextElementSibling;
            imageContainer.style.display = (imageContainer.style.display === 'none') ? 'block' : 'none';
        }

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</body>
</html>
