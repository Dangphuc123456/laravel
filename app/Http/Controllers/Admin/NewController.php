<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index()
    {
        $tt = TinTuc::all();
        return view('admin.new.index', compact('tt'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tt = TinTuc::where('id', $id)->first();

        if (!$tt) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $title = $tt->title;
        $author = $tt->author;
        $content_1 = $tt->content_1;
        $content_2 = $tt->content_2;
        $content_3 = $tt->content_3;
        $content_4 = $tt->content_4;
        $content_5 = $tt->content_5;
        $content_6 = $tt->content_6;
        $content_7 = $tt->content_7;
        $content_8 = $tt->content_8;
        $content_9 = $tt->content_9;
        $image_1 = $tt->image_1;
        $image_2 = $tt->image_2;
        $image_3 = $tt->image_3;
        $image_4 = $tt->image_4;
        $image_5 = $tt->image_5;
        $created_at = $tt->created_at;
        $updated_at = $tt->updated_at;

        return view('admin.new.detail', compact(
            'tt',
            'id',
            'title',
            'author',
            'content_1',
            'content_2',
            'content_3',
            'content_4',
            'content_5',
            'content_6',
            'content_7',
            'content_8',
            'content_9',
            'image_1',
            'image_2',
            'image_3',
            'image_4',
            'image_5',
            'created_at',
            'updated_at'
        ));
    }


    public function edit(String $id)
    {
        $tt = TinTuc::where('id', $id)->first();

        if (!$tt) {
            return abort(404); // Trả về trang lỗi 404 nếu không tìm thấy sản phẩm
        }
        return view('admin.new.edit', compact('tt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $tt = TinTuc::find($id);
        if (!$id) {
            // Xử lý khi không tìm thấy sản phẩm
            return abort(404); // Trả về trang lỗi 404
        }
        $request->validate([
            // Định nghĩa các quy tắc kiểm tra dữ liệu
            // Ví dụ: 'CatName' => 'required|max:255',
        ]);
        // Cập nhật các thuộc tính của tt từ dữ liệu được gửi từ form
        $tt->title = $request->title;
        $tt->author = $request->author;
        $tt->content_1 = $request->content_1;
        $tt->content_2 = $request->content_2;
        $tt->content_3 = $request->content_3;
        $tt->content_4 = $request->content_4;
        $tt->content_5 = $request->content_5;
        $tt->content_6 = $request->content_6;
        $tt->content_7 = $request->content_7;
        $tt->content_8 = $request->content_8;
        $tt->content_9 = $request->content_9;
        $tt->image_1 = $request->image_1;
        $tt->image_2 = $request->image_2;
        $tt->image_3 = $request->image_3;
        $tt->image_4 = $request->image_4;
        $tt->image_5 = $request->image_5;
        $tt->created_at = $request->create_dat;
        $tt->updated_at = $request->updated_at;
        // Lưu các thay đổi vào cơ sở dữ liệu
        $tt->save();
        return redirect()->route('admin.new.index', ['id' => $id])->with('success', 'Danh mục đã được cập nhật thành công.');
    }
}
