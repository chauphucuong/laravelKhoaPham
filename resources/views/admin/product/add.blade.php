@extends('master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <form action="{!! route('admin.product.postAdd') !!}" method="POST" enctype="multipart/form-data">
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
                            <?php cate_parent($cate ,0, "--",old('sltParent'))?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!!old('txtName')!!}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!!old('txtPrice')!!}"/>
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{!!old('txtIntro')!!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{!!old('txtContent')!!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages" value="{!!old('fImages')!!}">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeyyword" placeholder="Please Enter Category Keywords"value="{!!old('txtOrder')!!}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{!!old('txtDescription')!!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                @for($i =1;$i <= 10 ;  $i++)
                <div class="form-group">
                    <label>Image Product Detail {{ $i }}</label>
                    <input type="file" name="fProductDetail[]"/>
                </div>
                @endfor
            </div>
        </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
