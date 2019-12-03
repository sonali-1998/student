@extends('layouts.test')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container" style=" margin-top: 63px; margin-left: -46%; ">
            <div class="row"> 

                <div class="pull-left" style="margin-top: 90px;margin-left: 21px;">
                    <h2>Student Listing </h2>
                </div><br> 
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.create') }}"> Add Student</a>
                </div> 
                <div class="pull-right" style="margin-right: 1%;">
                    <a class="btn btn-primary" href="{{ action('StudentController@import') }}"> Add Multiple Students</a>
                </div> 
            </div>
            @if ($message = Session::get('success')) 
            <div class="alert alert-success" style="margin-right: 90px;">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Roll No.</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Class Name</th> 
                    <th>Section Name</th> 
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($students as $student)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->roll_number}}</td> 
                    <td>{{ $student->student_name}}</td> 
                    <td>{{ $student->father_name}}</td> 
                    <td>{{ $student->mother_name}}</td> 
                    <td>{{ $student->gender}}</td> 
                    <td>{{ $student->dob}}</td> 
                    <td>{{ $student->address}}</td> 
                    <td>{{ $student->classes->class_name }} </td>
                    <td>{{ $student->sections->section_name }} </td>
                    </td>  
                    <td> 
                        <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    </td> 
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $student->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach

            </table>
            {!! $students->render() !!}
            @endsection
        </div>

    </body>
</html>
