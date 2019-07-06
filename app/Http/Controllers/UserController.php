<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
class UserController extends Controller
{ 
    
    public function getList(){
        $user = User::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
        return view('admin.user.list',compact('user'));
    }

    public function getAdd(){
        return view('admin.user.add');
    }

    public function postAdd(UserRequest $request){
        $user = new User();
        $user->username = $request->txtUser;
        $user->password = Hash::make($request->txtPass);
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash_level'=>'success','flash_message'=>'Success Complete Add']);
    }

    public function getEdit($id){
        $user = User::find($id);
        //Nếu user đang sử dụng khác 2(không phải là superadmin) và id truyền qua khi nhất Edit bằng 2
        // hay level user = 1 và user id đang sử dụng phải khác id truyền qua
        if((Auth::user()->id !=2) && ($id == 2 || ($user["level"] == 1 && (Auth::user()->id != $id)))){
            return redirect()->route('admin.user.getList')->with(['flash_level'=>'danger','flash_message'=>'Sorry | You can\'t Access Edit']);
        }
        return view('admin.user.edit',compact('user','id'));
    }
    public function postEdit($id,Request $request){
        $user = User::find($id);
        if($request->input('txtPass')){
            $this->validate($request,
            [
                'txtRePass'=>'same:txtRePass'
            ],[
                'txtRePass.same' => 'Two Password Don\'t Match'
            ]);
            $pass = $request->input('txtPass');
            $user->password = Hash::make($pass);
        }
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash_level'=>'success','flash_message'=>'Success Complete Edit']);
    }
    // Trong bảng User thì Admin có id=2 và level = 1 =>Superadmin có thể xóa admin vs member
    // id != 2 và level = 1 => Admin chỉ có thể xóa member
    // Member thì không thể vào được do middleware bắt lổi level=1
    public function getDelete($id){
        $user_current_login = Auth::user()->id;     //Tìm mã User đang thực hiện việc xóa
        $user = User::find($id);                    //Lấy dữ liệu của user được click vào delete
        if(($id == 2) || ($user_current_login != 2 && $user["level"] == 1)){
            //khi chúng ta ấn delete sẽ gửi qua 1 id nếu id =2(superadmin) hay là admin thì quay về
            return redirect()->route('admin.user.getList')->
            with(['flash_level'=>'danger','flash_message'=>'Sorry | You can\'t Access Delete']);
        }//Ngược lại xóa được
        else{
            $user->delete($id);
            return redirect()->route('admin.user.getList')->
            with(['flash_level'=>'success','flash_message'=>'Success Complete Delete User']);
        }
    }
}
