<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = customer::all();
        return view('admin.customer.index',compact('customer'));
    }


    public function destroy(String $CusID)
    {
        $customer = customer::find($CusID);
        $customer->delete();
        return redirect()->route('admin.customer.index')->with('success', 'Xóa danh mục thành công!');
    }
    
}
