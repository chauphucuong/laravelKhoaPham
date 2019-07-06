@extends('master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                @if(Session::has('flash_message'))
                <div class="alert alert-{!! Session::get('flash_level') !!}">
                    {!! Session::get('flash_message') !!}
                </div>
                @endif
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt =0 ?>
                    @foreach($data as $item)
                    <?php $stt +=1?>
                    <tr class="odd gradeX" align="center">
                        <td>{!! $stt !!}</td>
                        <td>{!! $item->name !!}</td>
                        <td>{{ number_format($item->price,0,",",".")}}VNĐ</td>
                        <td>
                            <?php
                                // Thiếp lập mốc thòi gian xác định dữ liệu được tạo khoảng bao lâu vd 33 second ago
                                echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans()
                                ?>
                        </td>
                        <td>
                            <?php $cate = DB::table('category')->where('id',$item["cate_id"])->first(); ?>
                            @if(!empty($cate->name))
                                {!! $cate->name !!}
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a onclick="return xacnhanxoa('Bạn có chắc muốn xóa không?')"
                            href="{!! URL::route('admin.product.getDelete',$item->id) !!}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a href="{!! URL::route('admin.product.getEdit',$item->id) !!}">Edit</a></td>
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
