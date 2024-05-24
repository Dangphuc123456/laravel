<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index',compact('contact'));
    }

    public function show(string $id)
    {
        $contact = Contact::where('id', $id)->first();

        if (!$contact) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $id=$contact->id;
        $email=$contact->email;
        $message=$contact->message;
        $created_at=$contact->created_at;
        $updated_at =$contact->updated_at;

        return view('admin.contact.detail', compact('contact', 'id', 'email', 'message', 'created_at', 'updated_at'));
    }


    public function destroy(String $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Xóa danh mục thành công!');
    }
}
