<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::all();
        return view('admin.category.index',compact('category'));
    }

    public function create()
    {
        // Xử lý logic và trả về view cho trang create
        return view('admin.category.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $data = [
                
                'CatName' => $request->input('CatName'),
                'MetaTitle' => $request->input('MetaTitle'),
                'Stuffs' => $request->input('Stuffs'),
                'RooID' => $request->input('RooID'),
                'DisplayOrder' => $request->input('DisplayOrder'),
                'created_at' => date("Y-m-d H:i:s"),
                'CreateBy' => $request->input('CreateBy'),
                'ModifiedDate' =>date("Y-m-d H:i:s"),
                'MetaDescriptions' => $request->input('MetaDescriptions'),
                // 'Status' => $request->input('Status'),
                'Status' => $request->input('Status') ? 1 : 0,
                'ShowMenu' => $request->input('ShowMenu') ? 1 : 0,
                'updated_at' =>date("Y-m-d H:i:s"),                        
            ];
            Category::create($data);
            //sau khi thêm xong hiển thị sang trang index thông báo thêm thành công
            return redirect()->route('admin.category.index')->with('success','Thêm thành công danh mục!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $CatID)
    {
        $category = Category::where('CatID', $CatID)->first();

        if (!$category) {
            // Xử lý khi không tìm thấy category với CatID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $CatName = $category->CatName;
        $MetaTitle = $category->MetaTitle;
        $Stuffs = $category->Stuffs;
        $RooID = $category->RooID;
        $DisplayOrder = $category->DisplayOrder;
        $created_at = $category->created_at;
        $CreateBy = $category->CreateBy;
        $ModifiedDate = $category->ModifiedDate;
        $MetaDescriptions = $category->MetaDescriptions;
        $Status = $category->Status;
        $ShowMenu = $category->ShowMenu;
        $updated_at = $category->updated_at;

        return view('admin.category.detail', compact('category','CatID','CatName','MetaTitle','Stuffs','RooID','DisplayOrder','created_at','CreateBy','ModifiedDate','MetaDescriptions','Status','ShowMenu','updated_at'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $CatID)
    {
        $category = Category::where('CatID', $CatID)->first();
        if (!$category) {
            // Xử lý khi không tìm thấy category với CatID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $CatID)
    {
        $category = Category::find($CatID);
        if (!$category) {
            // Xử lý khi không tìm thấy category với CatID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $request->validate([
            // Định nghĩa các quy tắc kiểm tra dữ liệu
            // Ví dụ: 'CatName' => 'required|max:255',
        ]);
        // Cập nhật các thuộc tính của category từ dữ liệu được gửi từ form
        $category->CatName = $request->CatName;
        $category->MetaTitle = $request->MetaTitle;
        $category->Stuffs = $request->Stuffs;
        $category->RooID = $request->RooID;
        $category->DisplayOrder = $request->DisplayOrder;
        $category->CreateBy = $request->CreateBy;
        $category->ModifiedDate = $request->ModifiedDate;
        $category->MetaDescriptions = $request->MetaDescriptions;
        $category->Status = $request->Status;
        $category->ShowMenu = $request->ShowMenu;
        // Cập nhật các thuộc tính khác tương tự
        $category->save();
        return redirect()->route('admin.category.index', ['CatID' => $CatID])->with('success', 'Danh mục đã được cập nhật thành công.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $CatID)
    {
        $category = Category::find($CatID);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Xóa danh mục thành công!');
    }
}
