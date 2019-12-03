@extends('layouts.test')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Class</h2>
        </div>
        <br>
        <div class="pull-right" style="margin-right: 21%;margin-top: 100px;">
            <a class="btn btn-primary" href="{{ route('classes.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif 
{!! Form::open(array('route' => 'classes.store','method'=>'POST')) !!}
@include('admin.class-form')
{!! Form::close() !!}
@endsection
