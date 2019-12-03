    @extends('layouts.test')

@section('content')
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container" style="margin-top: 25%; width: 70%"> 
            <form action="bulk-upload" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Upload File:</label>
                    <input type="file" name="student_xls" required/>
                </div>  
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>

</body>
</html>
@endsection


