@extends('master')
@section('content')
<style>
    .img_current {width:150px;}
    .img_detail {width:200px;margin-botton:2px}
    .icon-del {position :relative; top:-46px; left :-20px;}
    #insert {margin-top : 20px}
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                    @include('admin.block.error')
                    @csrf
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="sltParent">
                            {{-- Bỏ giá trị value đi thi sẽ bắt lỗi được --}}
                            <option value="">Please Choose Category</option>
                            {{-- @foreach($parent as $item)
                            <option value="">{!! $item["name"] !!}</option>
                            @endforeach --}}
                            <?php cate_parent($cate ,0, "--",$product->cate_id)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName',isset($product)? $product['name']:null)  !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice',isset($product)? $product['price']:null)  !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product)? $product['intro']:null)  !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($product)? $product['content']:null)  !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images Current</label>
                        <img src="{!!asset('resources/upload/'.$product['image'])!!}" class="img_current"/>
                        <input type="hidden" name="img_current" value="{!! $product['image'] !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeyWord" placeholder="Please Enter Category Keywords" value="{!! old('txtKeyWord',isset($product)? $product['keywords']:null)  !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($product)? $product['description']:null)  !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                @foreach($product_image as $key=> $item)
                    <div class="form-group" id="{!! $key!!}">
                        <img src="{!! asset('resources/upload/detail/'.$item['images'])!!}"
                          class="img_detail"idHinh="{!! $item['id'] !!}" id="{!! $key!!}"/>
                        {{-- Nút xóa --}}
                        <a href="javascript:void(0)" type="button" id="del_img_demo"
                         class="btn btn-danger btn-circle icon-del"><i class="fa fa-times"></i></a>
                    </div>
                @endforeach
                <button type="button" class="btn btn-primary" id="addImages" > Add Images</button>
                <div id="insert"></div>
            </div>
        </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<!-- /#page-wrapper -->
@endsection
