 @extends('admin.layout.index')
 @section('content')
<div class="breadcrumbs" class="col-md-12">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{trans('albumsingers.list')}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title text-right">
                <ol class="breadcrumb ">
                  <a href="{{url('admin/albumsingers/create')}}"><h2><i class="text-success fa fa-plus-square"></i></h2></a>
                </ol>
            </div>
        </div>
    </div>
</div>
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
                                    <th>{{trans('albumsingers.name')}}</th>
                                    <th>{{trans('albumsingers.singer')}}</th>
                                    <th>{{trans('albumsingers.avatar')}}</th>
                                    <th>{{trans('albumsingers.edit')}}</th>
                                    <th>{{trans('albumsingers.delete')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($albumSinger as $albumSinger)
                                    <tr>
                                        <td><a href={{ url("admin/$albumSinger->id/albumsongs") }}>{{$albumSinger->name}}</a></td>
                                        <th>{{$albumSinger->singer->name}}</th>
                                        <td>
                                            <div class="thumbnail">
                                                <img src="{!! asset("$albumSinger->avatar") !!}" width="60" height="40" >
                                                <span >
                                                    <img src="{!! asset("$albumSinger->avatar") !!}"with="250" height="190" >
                                                </span>
                                            </div>
                                        </td>
                                        <td><a href={!! url("admin/albumsingers/$albumSinger->id/edit") !!}><i class="text-warning fa fa-eraser"></i></a></td>
                                        <td><a href={!! url("admin/albumsingers/delete/$albumSinger->id ") !!}><i class="text-danger fa fa-trash-o"></i></a></td>
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
