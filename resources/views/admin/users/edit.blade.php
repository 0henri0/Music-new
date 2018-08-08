@extends('admin.layout.index') @section('content')
<!-- Page Content -->
<div class="breadcrumbs" class="col-md-12">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{trans('users.titleEdit')}}: {{$user->email}}</h1>
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
    {!! Form::open(['url' => "admin/users/$user->id",'files' => true, 'method' => 'put']) !!}
        {!! Form::token()!!}
        <div class="form-group">
            {!!Form::label(trans('users.nameEdit')) !!}
            <br>
            {!!Form::text('name',$user->name,['class'=>'form-control','placeholder'=> trans('users.placeholderNameEdit')] ) !!}
            <!-- <input class="form-control" name="name" placeholder="Điền tên người dùng" value="{{$user->name}}" /> -->
        </div>
        <div class="form-group">
            {!!Form::label('Email') !!}
            <br>
            {!!Form::text('', $value = $user->email,['class'=>'form-control','readonly'=>''] ) !!}
        </div>
         <div class="form-group">
            {!!Form::label(trans('users.changePassEdit')) !!}
            <br>
            {!!Form::checkbox('changePassword', 'value', false ) !!}
            {!!Form::password('password',['class'=>'form-control password','disabled'=>''] ) !!}
        </div>
        <div class="form-group">
            {!!Form::label(trans('users.passConfirmEdit')) !!}
            <br>
            {!!Form::password('passwordAgain',['class'=>'form-control password','disabled'=>''] ) !!}
        </div>
        <div class="form-group">
            {!!Form::label(trans('users.introductionEdit')) !!}
            {!!Form::textarea('introduction', $value = $user->introduction, ['class'=>'form-control ckeditor','row'=>'10']) !!}
        </div>
        <div class="form-group">
            {!!Form::label(trans('users.statusEdit')) !!}
            @if($user->status)
                {!!Form::radio('status', '0', 0) !!}
                {!!Form::label(null,trans('users.statusNormalEdit'),['class'=>'radio-inline']) !!}
                {!!Form::radio('status', '1' , 1) !!}
                {!!Form::label(null,trans('users.statusDisableEdit'),['class'=>'radio-inline']) !!}
            @else
                {!!Form::radio('status', '0', 1) !!}
                {!!Form::label(null,trans('users.statusNormalEdit'),['class'=>'radio-inline']) !!}
                {!!Form::radio('status', '1' , 0) !!}
                {!!Form::label(null,trans('users.statusDisableEdit'),['class'=>'radio-inline']) !!}
            @endif
        </div>
        <div class="form-group">
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

        {!!Form::submit(trans('users.subEdit'),['class'=>'btn btn-success']) !!}
        {!!Form::reset(trans('users.resetEdit'),['class'=>'btn btn-warning']) !!}
    {!! Form::close() !!}
</div>
<!-- /#page-wrapper -->
@endsection @section('script')
<script>
$(document).ready(function() {

    $('[name="changePassword"]').change(function() {
        if ($(this).is(":checked")) {
            $(".password").removeAttr('disabled');
        } else {
            $(".password").attr('disabled', '');
        }
    });
});

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
    });
</script>
@endsection
