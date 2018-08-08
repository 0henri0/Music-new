@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div class="breadcrumbs" class="col-md-12">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{trans('singers.create')}}</h1>
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
    {!! Form::open(['url' => "admin/singers",'files' => true, 'method' => 'post']) !!}
        {!! Form::token()!!}
        <div class="form-group">
            {!!Form::label(trans('singers.name')) !!}
            <br>
            {!!Form::text('name',null,['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!!Form::label(trans('singers.country')) !!}
            <br>
            <select id="select-state" name="country_id" class="demo-default" style="width:600px" placeholder="Select a state...">
                @foreach($country as $c)
                    <option value="{{$c->id}}" >{!! $c->name !!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!!Form::label(trans('singers.introduction')) !!}
            {!!Form::textarea('introduction', null, ['class'=>'form-control ckeditor','row'=>'10']) !!}
        </div>
        <div class="form-group">
            {!!Form::label(trans('singers.vague')) !!}
            {!!Form::radio('vague', '0', 1) !!}
            {!!Form::label(null,trans('singers.vague0'),['class'=>'radio-inline']) !!}
            {!!Form::radio('vague', '1' , 0) !!}
            {!!Form::label(null,trans('singers.vague1'),['class'=>'radio-inline']) !!}

        </div>
        <div class="form-group" style="width: 600px">
            {!!Form::label('Image') !!}
            <div class="input-group">
                <div class="custom-file">
                     {!!Form::file('avatar',$attributes = ['class'=>'custom-file-input','id'=>'avatar']) !!}
                     {!!Form::label('Choose image',null,['class'=>'custom-file-label']) !!}
                </div>
                <div style="width: 100vw;" id="imgupload">
                </div>
            </div>
        </div>

        {!!Form::submit(trans('singers.submit'),['class'=>'btn btn-success']) !!}
        {!!Form::reset(trans('singers.reset'),['class'=>'btn btn-warning']) !!}
    {!! Form::close() !!}
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("input[name=avatar]").change(function(){
            $("#avatar").html($("input[name=avatar]").val());
        });
        $("input[name=avatar]").change(function(e) {
            var file = e.originalEvent.srcElement.files[e.originalEvent.srcElement.files.length-1];
            var img = document.createElement("img");
            var reader = new FileReader();
            reader.onloadend = function() {
                img.src = reader.result;
            }
            reader.readAsDataURL(file);
            $("#imgupload").html(img);
            img.width = "300";
        });
    });
    $('#select-state').selectize({
                   create: false,
                });
</script>
@endsection
