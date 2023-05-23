<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Company Details - Laravel 9 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Students Details</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Students Name:</strong>
                    <p>{{ $company->name }}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Students Email:</strong>
                    <p>{{ $company->email }}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Students Address:</strong>
                    <p>{{ $company->address }}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Student Image:</strong>
                    @if ($company->image)
                        <img src="{{ asset('images/' . $company->image) }}" alt="Company Image" width="200px">
                    @else
                        No Image
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>