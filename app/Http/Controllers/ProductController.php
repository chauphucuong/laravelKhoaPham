<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Products;
use App\Cate;
use App\Http\Requests\ProductRequest;
use App\ProductImages;
use Illuminate\Support\Facades\Input;
use File;
use Request;
use Auth;
class ProductController extends Controller
{
    public function getList(){
        $data =Products::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get();
        return view('admin.product.list',compact('data'));
    }
    // protected $fillable = ['name','alias','price','intro','content','image','keywords','description','user_id','cate_id'];
    public function getAdd(){
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.add',compact('cate'));
    }

    public function postAdd(ProductRequest $request){
        $file_name= $request->file('fImages')->getClientOriginalName();
        $product =new Products;
        $product->name = $request->txtName;
        $product->alias = changeTitle($request->txtName);
        $product->price= $request->txtPrice;
        $product->intro=$request->txtIntro;
        $product->content= $request->txtContent;
        $product->image= $file_name;
        $product->keywords= $request->txtKeyyword;
        $product->description= $request->txtDescription;
        $product->user_id=Auth::User()->id;
        $product->cate_id =$request->sltParent;
        //hình đại diện
        $request->file('fImages')->move('resources/upload/',$file_name);
        $product->save();
        $product_id=$product->id;
        if($request->hasFile('fProductDetail')) {
            //các hình ảnh khác cho 1 sản phẩm
            foreach($request->file('fProductDetail') as $image) {
                //lấy tên file Tulip.jpg
                $filenameWithExt = $image->getClientOriginalName();
                //lấy tên của hình Tulip
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Lấy type hình (VD : jpg)
                $extension = $image->getClientOriginalExtension();
                //Tránh việc trùng hình nên dùng biến time()
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $image->move('resources/upload/detail/',$fileNameToStore);
                // Lấy đường dẫn tên file /resources/..../t + tên file
                // $path = $image->storeAs('resources/upload/detail/', $fileNameToStore);
                // dd($path);
                $image = new ProductImages([
                    'products_id' => $product->id,
                    'images' => $fileNameToStore,
                ]);

                $image->save();
            }
        }
        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Category']);
    }

    public function getEdit($id){
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
        $product = Products::find($id);
        $product_image = Products::find($id)->images;
        return view('admin.product.edit',compact('cate','product','product_image'));
    }

    public function postEdit(ProductRequest $request,$id){
        $product = Products::find($id);
        $product->name = Request::input('txtName');
        $product->alias = Request::input('txtName');
        $product->price= Request::input('txtPrice');
        $product->intro= Request::input('txtIntro');
        $product->content= Request::input('txtContent');
        $product->keywords= Request::input('txtKeyWord');
        $product->description= Request::input('txtDescription');
        $product->user_id= Auth::User()->id;
        $product->cate_id = Request::input('sltParent');

        $img_current = 'resources/upload/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('resources/upload/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }
        else{
            echo "Không có file";
        }
        $product->save();
        if(!empty(Request::file('fProductDetail'))){
            foreach(Request::file('fProductDetail') as $file){
                $product_img = new ProductImages;
                if(isset($file)){
                    $product_img->images = $file->getClientOriginalName();
                    $product_img->products_id = $id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                }
                $product_img->save();
            }

        }
        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Category']);
    }

    public function getDelete($id){
        $product_detail = Products::find($id)->images->toArray();
        // File::delete('resources/upload/detail/1.jpg');
        foreach($product_detail as $value)
        {
            // Xóa file lữu trữ hình
            File::delete('resources/upload/detail/'.$value["images"]);
            // Xóa dữ liệu trong product_image trong database
            $product_image = ProductImages::where('id',$value["id"])->delete();
        }
        $product = Products::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);
        return redirect()->route('admin.product.getList')->
        with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Category']);
    }

    public function getDelImg($id)
    {   //Request phải là ajax
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');  //idHinh luôn là int
            $image_detail = ProductImages::find($idHinh);
            if(!empty($image_detail)){
                $img = 'resources/upload/detail/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img); //xóa hình trong thư mục đường dẫn trên
                }
                $image_detail->delete();    //Xóa dữ liệu trong database hình đó
            }
            return "Oke";
        }
    }
}
