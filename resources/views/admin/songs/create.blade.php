@extends('admin.layout.index') @section('content')
<!-- Page Content -->
<div class="breadcrumbs" class="col-md-12">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Song</h1>
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
    {!! Form::open(['url' => 'admin/songs','files' => true, 'method' => 'post']) !!}
        {!! Form::token()!!}
        <div class="form-group">
            {!!Form::label('Tên') !!}
            <br>
            {!!Form::text('name',null,['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!!Form::label('Category') !!}
            <br>
            <select id="select-state" name="category_id[]" multiple class="demo-default" style="width:600px" placeholder="Select a state...">
                @foreach($category as $c)
                    <option value="{{$c->id}}" >{!! $c->name !!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!!Form::label('Singer') !!}
            <br>
            <select id="select-state2" name="singer_id[]" multiple class="demo-default" style="width:600px" placeholder="Select a state...">
                @foreach($singer as $singer)
                    <option value="{{$singer->id}}" >{!! $singer->name !!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!!Form::label('Lyrics') !!}
            {!!Form::textarea('lyrics', null, ['class'=>'form-control ckeditor','row'=>'10']) !!}
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
        <div class="form-group" style="width: 600px">
            {!!Form::label('Audio') !!}
            <div class="input-group">
                <div class="custom-file">
                     {!!Form::file('fileSong',$attributes = ['class'=>'custom-file-input']) !!}
                     {!!Form::label('Choose audio',null,['class'=>'custom-file-label','id'=>'labelsong']) !!}
                </div>
                <div style="width: 100vw;" id="audioUpload">
                </div>
            </div>
        </div>

        {!!Form::submit('Gửi',['class'=>'btn btn-success']) !!}
        {!!Form::reset('Làm mới',['class'=>'btn btn-warning']) !!}
    {!! Form::close() !!}
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script>

</script>
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
        $("input[name=fileSong]").change(function(e) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#labelsong").html(tmppath);
        });
    });
    $('#select-state').selectize({
                   create: false,
                });
    $('#select-state2').selectize({
                   create: false,
                });
</script>
@endsection
