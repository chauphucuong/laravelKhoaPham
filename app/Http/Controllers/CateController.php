<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Console\Presets\React;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller
{
    public function getList(){
        $data =Cate::select('id','name','parent_id')->orderBy('id','DESC')->get();
        return view('admin.cate.list',compact('data'));
    }

    public function getAdd(){
        $parent = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.add',compact('parent'));
    }

    public function postAdd(CateRequest $request){
        $cate =new Cate;
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order= $request->txtOrder;
        $cate->parent_id=$request->sltParent;
        $cate->keywords=$request->txtKeyWord;
        $cate->description =$request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.getList')
        ->with(['flash_level'=>'success',
        'flash_message'=>'Success !! Complete Add Category']);                                          
    }

    public function getEdit($id){
        $data= Cate::findOrFail($id)->toArray();
        $parent = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.edit',compact('parent','data','id'));
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'txtCateName' =>'required | unique:category,name',
            'txtOrder'=>'required',
            'txtKeyword'=>'required',
            'txtDescription'=>'required',
        ],[
            'txtCateName.required' =>'Please Enter Name Category',
            'txtCateName.unique' =>'This name category is exists',
            'txtOrder.required' =>'Please Enter Order',
            'txtDescription.required' =>'Please Enter Description',
            'txtKeyword.required' =>'Please Enter KeyWord'
        ]);
        $cate = Cate::find($id);
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order= $request->txtOrder;
        $cate->parent_id=$request->sltParent;       
        $cate->keywords=$request->txtKeyword;
        $cate->description =$request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Category']);
    }

    public function getDelete($id){
        $parent = Cate::where('parent_id',$id)->count();
        if($parent == 0){
            $data = Cate::find($id);
            $data->delete($id);
            return redirect()->route('admin.cate.getList')->
                with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Category']); 
        }
        else{
            echo "<script type='text/javascript'>
            alert('Sorry ! You can not delete this Category');
            window.location ='";
                echo route('admin.cate.getList');
            echo "' </script>";
            
        }
        
    }
}
