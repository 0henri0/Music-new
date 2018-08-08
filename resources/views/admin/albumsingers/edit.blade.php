@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div class="breadcrumbs" class="col-md-12">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{trans('albumsingers.edit')}}  {{$albumSinger->singer->name}}</h1>
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
    {!! Form::open(['url' => "admin/albumsingers/$albumSinger->id",'files' => true, 'method' => 'put']) !!}
        {!! Form::token()!!}
        <div class="form-group">
            {!!Form::label(trans('albumsingers.name')) !!}
            <br>
            {!!Form::text('name',$albumSinger->name,['class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
            {!!Form::label(trans('albumsingers.country')) !!}
            <br>
            <select id="select-state" name="country_id" class="demo-default" style="width:600px" placeholder="Select a state...">
                @foreach($singer as $s)
                    @if($albumSinger->singer_id==$s->id)
                    <option value="{{$s->id}}" selected>{!! $s->name !!}</option>
                    @else
                    <option value="{{$s->id}}" >{!! $s->name !!}</option>
                    @endif
                @endforeach
            </select>
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

        {!!Form::submit(trans('albumsingers.submit'),['class'=>'btn btn-success']) !!}
        {!!Form::reset(trans('albumsingers.reset'),['class'=>'btn btn-warning']) !!}
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
