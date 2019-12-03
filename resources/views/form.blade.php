<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container"> 
            <div class="form-group" style="width: 53%;">
                <label for="class_name" >Class Name:</label>
                {!! Form::text('class_name', null, array('placeholder' => ' Class Name','class' => 'form-control')) !!}
            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </body>
</html>


