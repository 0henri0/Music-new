 @extends('admin.layout.index')
 @section('content')
<div class="breadcrumbs" class="col-md-12">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Danh sách users</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title text-right">
                <ol class="breadcrumb ">
                  <a href="#"><h2><i class="text-success fa fa-plus-square"></i></h2></a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($user as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div class="thumbnail">
                                            <img src="{!! asset("$user->avatar") !!}" width="60" height="40" >
                                            <span >
                                                <img src="{!! asset("$user->avatar") !!}"with="250" height="190" >
                                            </span>
                                        </div>
                                </td>
                                    <td>
                                        @if($user->status==0)
                                        <div class="text-success">
                                            Bình thường
                                        </div>
                                        @else
                                        <div class="text-danger">
                                            Khóa
                                        </div>
                                        @endif
                                    </td>
                                    <td><a href={!! url("admin/users/$user->id/edit") !!}><i class="text-warning fa fa-eraser"></i></a></td>
                                    <td><a href={!! url("admin/users/delete/$user->id ") !!}><i class="text-danger fa fa-trash-o"></i></a></td>
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
