@extends('master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            @if(Session::has('flash_message'))
            <div class="alert alert-{!! Session::get('flash_level') !!}">
                {!! Session::get('flash_message') !!}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt =0?>
                    @foreach($user as $item_user)
                    <?php $stt +=1?>
                    <tr class="odd gradeX" align="center">
                        <td>{!! $stt !!}</td>
                        <td>{!! $item_user["username"] !!}</td>
                        <td>
                            @if($item_user["id"] ==2)
                                Super Admin
                            @elseif($item_user["level"] == 1)
                                Admin
                            @else
                                Member
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc muốn xóa không?')" href="{!! URL::route('admin.user.getDelete',$item_user["id"]) !!}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item_user["id"]) !!}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection