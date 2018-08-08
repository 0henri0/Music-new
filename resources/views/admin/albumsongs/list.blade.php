@extends('admin.layout.index')
@section('content')
    <div class="breadcrumbs" class="col-md-12">
        <div class="col-sm-3">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Danh sách songs</h1>

                </div>

            </div>
        </div>
        <div class="col-sm-6">

            <div class="page-header float-right">
                <div class="page-title text-left">
                    <ol class="breadcrumb ">
                        {!! Form::open(['url' => "admin/$id/albumsongs/",'files' => true, 'method' => 'post']) !!}
                        {!! Form::token()!!}
                        <select id="select-state" name="song_id[]" multiple class="demo-default" style="width:300px"
                                placeholder="Select a state...">
                            @foreach($song2 as $song2)
                                <option value="{{$song2->id}}">{!! $song2->name !!}</option>
                            @endforeach
                        </select>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="page-header float-right">
                <div class="page-title text-right">
                    <ol class="breadcrumb ">
                        {!!Form::submit('ADD',['class'=>'btn btn-success']) !!}
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach()
                                </div>
                            @endif
                            @if(session('notify'))
                                <div class="alert alert-success">
                                    {{session('notify')}}
                                </div>
                            @endif


                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>status</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($song as $song)
                                    <tr>
                                        <td>{{$song->name}}</td>
                                        <td>{{$song->status}}</td>
                                        <td><a href={!! url("admin/$id/albumsongs/delete/$song->id ") !!}><i
                                                        class="text-danger fa fa-trash-o"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- .content -->
@endsection
@section('script')
    <script>
        $('#select-state').selectize({
            create: false,
        });
    </script>
@endsection