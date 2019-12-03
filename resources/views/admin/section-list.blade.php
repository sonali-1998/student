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
                        <h2>Section Listing </h2>
                    </div><br> 
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('sections.create') }}"> Add Section</a>
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
                    <th>Section Name</th> 
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($sections as $section)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $section->section_name}}</td> 
                    <td> 
                        <a class="btn btn-primary" href="{{ route('sections.edit',$section->id) }}">Edit</a>
                    </td> 
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['sections.destroy', $section->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $sections->render() !!}
            @endsection
        </div>

    </body>
</html>
