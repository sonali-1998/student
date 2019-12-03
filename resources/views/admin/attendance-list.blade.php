@extends('layouts.test')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container" style=" margin-top: 63px; margin-left: -46%; ">
            <div class="row"> 

                <div class="pull-left" style="margin-top: 90px;margin-left: 21px;">
                    <h2>Attendance Listing </h2>
                </div><br> 
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('attendances.create') }}"> Add Attendance</a>
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
                    <th>Date</th> 
                    <th>Class Name</th> 
                    <th>Section Name</th> 
                    <th>Status</th> 
<!--                    <th>Edit</th>
                    <th>Delete</th>-->
                </tr>
                @foreach ($attendances as $attendance)

                <tr>
                    <td>{{ ++$i }}</td> 
                    <td>{{ $attendance->attendance_date}}</td>  
                    <td>{{ $attendance->classes->class_name }} </td>
                    <td>{{ $attendance->sections->section_name }} </td>
                    <td>{{ $attendance->status }} </td>
                    </td>  
<!--                    <td> 
                        <a class="btn btn-primary" href="{{ route('attendances.edit',$attendance->id) }}">Edit</a>
                    </td> 
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['attendances.destroy', $attendance->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>-->
                </tr>
                @endforeach

            </table>
            {!! $attendances->render() !!}
            @endsection
        </div>

    </body>
</html>
