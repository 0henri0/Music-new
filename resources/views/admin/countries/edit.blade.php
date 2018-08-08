@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div class="breadcrumbs" class="col-md-12">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{trans('countries.edit')}} {{$country->name}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="col-12" style="padding-bottom:120px">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err) {{$err}}
        <br> @endforeach()
    </div>
    @endif @if(session('notify'))
    <div class="alert alert-success">
        {{session('notify')}}
    </div>
    @endif
    {!! Form::open(['url' => "admin/countries/$country->id",'files' => true, 'method' => 'put']) !!}
        {!! Form::token()!!}
        <div class="form-group">
            {!!Form::label(trans('countries.name')) !!}
            <br>
            {!!Form::text('name',$country->name,['class'=>'form-control'] ) !!}
        </div>
        {!!Form::submit(trans('countries.edit'),['class'=>'btn btn-success']) !!}
        {!!Form::reset(trans('countries.reset'),['class'=>'btn btn-warning']) !!}
    {!! Form::close() !!}
</div>
<!-- /#page-wrapper -->
@endsection
