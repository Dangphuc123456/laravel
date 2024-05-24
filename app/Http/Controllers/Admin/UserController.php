<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }
    public function create()
    {
        return view('admin.user.create' );
    }
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string|max:20',
            'role' => 'required|in:employee,customer'
        ]);

        // Tạo người dùng mới
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.user.index')->with('success','Thêm thành công danh mục!');
    }
    public function destroy(String $id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Xóa danh mục thành công!');
    } 
}
