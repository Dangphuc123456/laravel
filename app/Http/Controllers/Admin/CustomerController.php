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
        $customer = customer::paginate(15);
        return view('admin.customer.index', compact('customer'));
    }


    public function destroy(String $CusID)
    {
        $customer = customer::find($CusID);
        $customer->delete();
        return redirect()->route('admin.customer.index')->with('success', 'Xóa khách hàng thành công!');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Initialize the query
        $query = Customer::query();

        // Search by CusName and CusPhone
        $query->where('CusName', 'LIKE', "%{$keyword}%")
            ->orWhere('CusPhone', 'LIKE', "%{$keyword}%");

        // If the keyword is numeric, add additional conditions
        if (is_numeric($keyword)) {
            $query->orWhere('CusID', $keyword); // Adjust this if you have another numeric field
        }

        // Get the results
        $customer = $query->get();

        return view('admin.customer.search', compact('customer', 'keyword'));
        
    }
}
