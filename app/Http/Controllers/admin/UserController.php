<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
         $users = User::paginate(1);
        // return $users;  this is test
        return view('admin_panel.user.index') -> with('users',$users);
    }

    public function edit($id){
        $user = User::find($id);
        // return $user;
        // Select * from user where id = $id
        return view('admin_panel.user.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        // dd($request->all());
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        return redirect('/admin/users')->with('successMsg','You have Successfully Updated');
    }
    public function delete($id){
        // dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('successMsg','You have Successfully Deleted');
    }
}
