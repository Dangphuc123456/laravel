<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tenncc' => 'required|string|max:200',
            'Diachi' => 'required|string|max:200',
            'Sdt' => 'required|string|max:50',
            'Email' => 'required|email|max:255',
            'Ghichu' => 'nullable|string',
        ]);

        $data['created_at'] = now();
        $data['updated_at'] = now();

        Supplier::create($data);

        return redirect()->route('admin.supplier.index')->with('success', 'Thêm thành công danh mục!');
    }
    public function show($id)
    {
        $supplier = Supplier::where('id', $id)->first();

        if (!$supplier) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $id =$supplier->id;
        $tenncc=$supplier->tenncc;
        $Diachi=$supplier->Diachi;
        $Sdt=$supplier->Sdt;
        $Email=$supplier->Email;
        $Ghichu=$supplier->Ghichu;
        $created_at=$supplier->created_at;
        $updated_at =$supplier->updated_at;

        return view('admin.supplier.detail', compact('supplier','id', 'tenncc','Diachi','Sdt','Email', 'Ghichu', 'updated_at','created_at'));
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return abort(404);
        }
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
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
        $supplier->update($data);

        return redirect()->route('admin.supplier.index', ['id' => $id])->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier) {
            $supplier->delete();
            return redirect()->route('admin.supplier.index')->with('success', 'Nhà cung cấp được xóa thành công.');
        } else {
            return abort(404);
        }
    }
}
