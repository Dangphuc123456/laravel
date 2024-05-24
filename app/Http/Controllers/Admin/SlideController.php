<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $slide = Slide::all();
        return view('admin.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(string $ProID)
    {
        $slide = Slide::where('ProID', $ProID)->first();

        if (!$slide) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $idanh =$slide->idanh;
        $image1=$slide->image1;
        $image2=$slide->image2;
        $image3=$slide->image3;
        $image4=$slide->image4;
        $image5=$slide->image5;
        $image6=$slide->image6;
        $created_at=$slide->created_at;
        $updated_at =$slide->updated_at;

        return view('admin.slide.detail', compact('slide','idanh', 'image1', 'image2', 'image3','image4', 'image5', 'image6', 'created_at','updated_at'));

    }


    /**
     * Show the form for edit a new resource.
     */
    public function edit(String $idanh)
    {
        $slide = Slide::where('idanh', $idanh)->first();
       
        if (!$slide) {
            return abort(404); // Trả về trang lỗi 404 nếu không tìm thấy sản phẩm
        }
        return view('admin.slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $idanh)
        {
            $slide = Slide::find($idanh);
            if (!$slide) {
                // Xử lý khi không tìm thấy sản phẩm
                return abort(404); // Trả về trang lỗi 404
            }
            $request->validate([
                // Định nghĩa các quy tắc kiểm tra dữ liệu
                // Ví dụ: 'CatName' => 'required|max:255',
            ]);
            // Cập nhật các thuộc tính của slide từ dữ liệu được gửi từ form
            $slide->idanh = $request->idanh;
            $slide->image1 = $request->image1;
            $slide->image2 = $request->image2;
            $slide->image3 = $request->image3;
            $slide->image4 = $request->image4;
            $slide->image5 = $request->image5;
            $slide->image6 = $request->image6;
            
            // Lưu các thay đổi vào cơ sở dữ liệu
            $slide->save(); 
            return redirect()->route('admin.slide.index', ['idanh' => $idanh])->with('success', 'Danh mục đã được cập nhật thành công.');
        }
        

}
