@extends('master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            @if(Session::has('flash_message'))
            <div class="alert alert-{!! Session::get('flash_level') !!}">
                {!! Session::get('flash_message') !!}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{!! URL::route('admin.user.postEdit',$user["id"])!!}" method="POST">
                    @csrf
                    @include('admin.block.error') 
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtUser" value="{!! old('txtUser',isset($user)? $user['username']:null)  !!}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail',isset($user)? $user['email']:null)  !!}"  />
                    </div>
                    @if(Auth::user()->id != $id)
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="1"  type="radio"
                            @if($user["level"] == 1){
                                checked="checked"
                            }
                            @endif
                            >Admin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="2" type="radio"
                            @if($user["level"] == 2){
                                checked="checked"
                            }
                            @endif
                            >Member
                        </label>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-default">User Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection