<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use Illuminate\Http\Request;

class GioithieuController extends Controller
{
    public function index()
    {
        $gt = Gioithieu::all();
        return view('admin.gioithieu.index',compact('gt'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gt = Gioithieu::where('id', $id)->first();

        if (!$gt) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $topic=$gt->topic;
        $content_1=$gt->content_1;
        $content_2=$gt->content_2;
        $content_3=$gt->content_3;
        $content_4=$gt->content_4;
        $content_5=$gt->content_5;
        $image=$gt->image;
        $created_at=$gt->created_at;
        $updated_at =$gt->updated_at;

        return view('admin.gioithieu.detail', compact('gt', 'id','topic','content_1','content_2','content_3','content_4','content_5','image','created_at','updated_at'));
    }


    public function edit(String $id)
    {
        $gt = Gioithieu::where('id', $id)->first();
       
        if (!$gt) {
            return abort(404); // Trả về trang lỗi 404 nếu không tìm thấy sản phẩm
        }
        return view('admin.gioithieu.edit', compact('gt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $gt = Gioithieu::find($id);
            if (!$id) {
                // Xử lý khi không tìm thấy sản phẩm
                return abort(404); // Trả về trang lỗi 404
            }
            $request->validate([
                // Định nghĩa các quy tắc kiểm tra dữ liệu
                // Ví dụ: 'CatName' => 'required|max:255',
            ]);
            // Cập nhật các thuộc tính của gt từ dữ liệu được gửi từ form
            $gt->topic = $request->topic;
            $gt->content_1 = $request->content_1;
            $gt->content_2 = $request->content_2;
            $gt->content_3 = $request->content_3;
            $gt->content_4 = $request->content_4;
            $gt->content_5 = $request->content_5;
            $gt->image = $request->image;
            $gt->created_at = $request->create_dat;
            $gt->updated_at = $request->updated_at;
            // Lưu các thay đổi vào cơ sở dữ liệu
            $gt->save(); 
            return redirect()->route('admin.gioithieu.index', ['id' => $id])->with('success', 'Danh mục đã được cập nhật thành công.');
    }

}
