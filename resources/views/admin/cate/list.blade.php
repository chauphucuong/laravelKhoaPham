@extends('master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if(Session::has('flash_message'))
                    <div class="alert alert-{!! Session::get('flash_level') !!}">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent_id</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach($data as $dt)
                    <?php $stt +=1?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>
                            @if($dt->parent_id == 0)
                                {!! "None" !!}
                            @else
                                <?php
                                    $parent = DB::table('category')->where('id',$dt->parent_id)->first();
                                    echo $parent->name;                       
                                ?>
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a onclick="return xacnhanxoa('Bạn có chắc muốn xóa không?')"
                             href="{!! route('admin.cate.getDelete',$dt->id) !!}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                             <a href="{!!route('admin.cate.getEdit',$dt->id) !!}">Edit</a></td>
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