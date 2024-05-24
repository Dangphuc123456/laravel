<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hoadonnhap;
use Illuminate\Http\Request;

class HoadonnhapController extends Controller
{
    public function index()
    {
        $hoadonnhap = Hoadonnhap::all();
        return view('admin.hoadonnhap.index', compact('hoadonnhap'));
    }

    public function create()
    {
        return view('admin.hoadonnhap.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string|max:200',
            'ProName' => 'required|string|max:255',
            'SoLuong' => 'required|integer|min:1',
            'DonGia' => 'required|numeric|min:0',
            'Diachi' => 'required|string|max:200',
            'Sdt' => 'required|string|max:50',
            'Email' => 'required|email|max:255',
            'Ghichu' => 'nullable|string',
        ]);

        // Calculate TongTien
        $data['TongTien'] = $data['SoLuong'] * $data['DonGia'];
        $data['created_at'] = now();
        $data['updated_at'] = now();

        Hoadonnhap::create($data);

        return redirect()->route('admin.hoadonnhap.index')->with('success', 'Thêm thành công sản phẩm nhập!');
    }


    public function show($id)
    {
        $hoadonnhap = Hoadonnhap::where('id', $id)->first();

        if (!$hoadonnhap) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $idNhap =$hoadonnhap->idNhap;
        $id=$hoadonnhap->id;
        $TongTien=$hoadonnhap->TongTien;
        $SoLuong=$hoadonnhap->SoLuong;
        $DonGia=$hoadonnhap->DonGia;
        $ProID=$hoadonnhap->ProID;
        $ProName=$hoadonnhap->ProName;
        $created_at=$hoadonnhap->created_at;
        $updated_at =$hoadonnhap->updated_at;

        return view('admin.hoadonnhap.detail', compact('hoadonnhap', 'idNhap', 'id', 'SoLuong', 'DonGia', 'TongTien', 'ProName', 'updated_at', 'created_at'));
    }

    public function edit($id)
    {
        $hoadonnhap = Hoadonnhap::find($id);
        if (!$hoadonnhap) {
            return abort(404);
        }
        return view('admin.hoadonnhap.edit', compact('hoadonnhap'));
    }

    public function update(Request $request, $id)
    {
        $hoadonnhap = Hoadonnhap::find($id);
        if (!$hoadonnhap) {
            return abort(404);
        }

        $data = $request->validate([
            'tenncc' => 'required|string|max:200',
            'Diachi' => 'required|string|max:200',
            'Sdt' => 'required|string|max:50',
            'Email' => 'required|email|max:255',
            'Ghichu' => 'nullable|string',
        ]);

        $data['updated_at'] = now();
        $hoadonnhap->update($data);

        return redirect()->route('admin.hoadonnhap.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $hoadonnhap = Hoadonnhap::find($id);
        if ($hoadonnhap) {
            $hoadonnhap->delete();
            return redirect()->route('admin.hoadonnhap.index')->with('success', 'Nhà cung cấp được xóa thành công.');
        } else {
            return abort(404);
        }
    }
}
