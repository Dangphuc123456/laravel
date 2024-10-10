<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = employee::all();
        return view('admin.employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $data = [
               
                'EmpName'=> $request->input('EmpName'),
                'EmpAddress' => $request->input('EmpAddress'),
                'EmpPhone' => $request->input('EmpPhone'),
                'EmpEmail' => $request->input('EmpEmail'),
                'EmpPosition' => $request->input('EmpPosition'),
                'EmpSalary' => $request->input('EmpSalary'),
                'EmpStartDate' => $request->input('EmpStartDate'),
                'EmpEndDate' => $request->input('EmpEndDate'),
                'EmpImage' => $request->input('EmpImage'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),                      
            ];
            employee::create($data);
            //sau khi thêm xong hiển thị sang trang index thông báo thêm thành công
            return redirect()->route('admin.employee.index')->with('success','Thêm thành công nhân viên!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $EmpID)
    {
        $employee = employee::where('EmpID', $EmpID)->first();

        if (!$employee) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $EmpID=$employee->EmpID;
        $EmpName=$employee->EmpName;
        $EmpAddress=$employee->EmpAddress;
        $EmpPhone=$employee->EmpPhone;
        $EmpEmail=$employee->EmpEmail;
        $EmpPosition=$employee->EmpPosition;
        $EmpSalary=$employee->EmpSalary;
        $EmpStartDate=$employee->EmpStartDate;
        $EmpEndDate = $employee->EmpEndDate;
        $EmpImage=$employee->EmpImage;
        $created_at=$employee->created_at;
        $updated_at =$employee->updated_at;

        return view('admin.employee.detail', compact('employee', 'EmpID', 'EmpName', 'EmpAddress', 'EmpPhone', 'EmpEmail', 'EmpPosition', 'EmpSalary', 'EmpStartDate', 'EmpEndDate', 'EmpImage', 'created_at', 'updated_at'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $EmpID)
    {
        $employee = employee::where('EmpID', $EmpID)->first();
       
        if (!$employee) {
            return abort(404); // Trả về trang lỗi 404 nếu không tìm thấy sản phẩm
        }
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $EmpID)
    {
        $employee = employee::find($EmpID);
            if (!$employee) {
                // Xử lý khi không tìm thấy sản phẩm
                return abort(404); // Trả về trang lỗi 404
            }
            $request->validate([
                // Định nghĩa các quy tắc kiểm tra dữ liệu
                // Ví dụ: 'CatName' => 'required|max:255',
            ]);
            // Cập nhật các thuộc tính của employee từ dữ liệu được gửi từ form
            $employee->EmpName = $request->EmpName;
            $employee->EmpAddress = $request->EmpAddress;
            $employee->EmpPhone = $request->EmpPhone;
            $employee->EmpEmail = $request->EmpEmail;
            $employee->EmpPosition = $request->EmpPosition;
            $employee->EmpSalary = $request->EmpSalary;
            $employee->EmpStartDate = $request->EmpStartDate;
            $employee->EmpEndDate = $request->EmpEndDate;
            $employee->EmpImage = $request->EmpImage;
            $employee->created_at = $request->created_at;
            $employee->updated_at = $request->updated_at;
            // Lưu các thay đổi vào cơ sở dữ liệu
            $employee->save(); 
            return redirect()->route('admin.employee.index', ['EmpID' => $EmpID])->with('success', 'Nhân viên đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $EmpID)
    {
        $employee = employee::find($EmpID);
        $employee->delete();
        return redirect()->route('admin.employee.index')->with('success', 'Xóa nhân viên thành công!');
    }
}
