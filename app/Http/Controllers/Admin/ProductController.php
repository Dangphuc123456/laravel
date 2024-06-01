<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Product::all();
        $perPage = 28;
        $page = $request->input('page', 1); // Lấy số trang hiện tại hoặc mặc định là 1
        $total = Product::count();
        $products = Product::offset(($page - 1) * $perPage)
                            ->limit($perPage)
                            ->get();
        return view('admin.product.index', compact('product','total', 'perPage', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $data = [
               
                'CatID'=> $request->input('CatID'),
                'Metatitle' => $request->input('Metatitle'),
                'ProName' => $request->input('ProName'),
                'ProDescription' => $request->input('ProDescription'),
                'ProColor' => $request->input('ProColor'),
                'Materials' => $request->input('Materials'),
                'Size' => $request->input('Size'),
                'ProImage' => $request->input('ProImage'),
                'Tags' => $request->input('Tags'),
                'MoreImage' => $request->input('MoreImage'),
                'created_at' => date("Y-m-d H:i:s"),
                'CreateBy' => $request->input('CreateBy'),
                'MetaDescriptions' => $request->input('MetaDescriptions'),
                'Displayhome' => $request->input('Displayhome'),
                'Status' => $request->input('Status') ? 1 : 0,
                'inventory' => $request->input('inventory'),
                'sold' => $request->input('sold'),
                'price'=> $request->input('price'),
                'updated_at' => date("Y-m-d H:i:s"),                      
            ];
            Product::create($data);
            //sau khi thêm xong hiển thị sang trang index thông báo thêm thành công
            return redirect()->route('admin.product.index')->with('success','Thêm thành công danh mục!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $ProID)
    {
        $product = Product::where('ProID', $ProID)->first();

        if (!$product) {
            // Xử lý khi không tìm thấy sản phẩm với ProID tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $CatID =$product->CatID;
        $Metatitle=$product->Metatitle;
        $ProName=$product->ProName;
        $ProDescription=$product->ProDescription;
        $ProColor=$product->ProColor;
        $Materials=$product->Materials;
        $Size=$product->Size;
        $ProImage=$product->ProImage;
        $Tags=$product->Tags;
        $MoreImage=$product->MoreImage;
        $created_at=$product->created_at;
        $CreateBy=$product->CreateBy;
        $MetaDescriptions=$product->MetaDescriptions;
        $Displayhome=$product->Displayhome;
        $Status=$product->Status;
        $inventory=$product->inventory;
        $price=$product->price;
        $sold=$product->sold;
        $quantity=$product->quantity;
        $updated_at =$product->updated_at;

        return view('admin.product.detail', compact('product','ProID', 'CatID', 'ProName', 'ProDescription', 'ProColor','Metatitle', 'Materials', 'Size', 'ProImage', 'Tags', 'MoreImage', 'created_at', 'CreateBy', 'MetaDescriptions', 'Displayhome', 'Status', 'inventory', 'price' , 'sold','quantity', 'updated_at'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $ProID)
    {
        $product = Product::where('ProID', $ProID)->first();
       
        if (!$product) {
            return abort(404); // Trả về trang lỗi 404 nếu không tìm thấy sản phẩm
        }
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $ProID)
        {
            $product = Product::find($ProID);
            if (!$product) {
                // Xử lý khi không tìm thấy sản phẩm
                return abort(404); // Trả về trang lỗi 404
            }
            $request->validate([
                // Định nghĩa các quy tắc kiểm tra dữ liệu
                // Ví dụ: 'CatName' => 'required|max:255',
            ]);
            // Cập nhật các thuộc tính của product từ dữ liệu được gửi từ form
            $product->CatID = $request->CatID;
            $product->Metatitle = $request->Metatitle;
            $product->ProName = $request->ProName;
            $product->ProDescription = $request->ProDescription;
            $product->ProColor = $request->ProColor;
            $product->Materials = $request->Materials;
            $product->Size = $request->Size;
            $product->ProImage = $request->ProImage;
            $product->Tags = $request->Tags;
            $product->MoreImage = $request->MoreImage;
            $product->CreateBy = $request->CreateBy;
            $product->MetaDescriptions = $request->MetaDescriptions;
            $product->Displayhome = $request->Displayhome;
            $product->Status = $request->Status;
            $product->inventory = $request->inventory;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->sold = $request->sold;
            // Lưu các thay đổi vào cơ sở dữ liệu
            $product->save(); 
            return redirect()->route('admin.product.index', ['ProID' => $ProID])->with('success', 'Danh mục đã được cập nhật thành công.');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $ProID)
    {
        $product = Product::find($ProID);
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Xóa danh mục thành công!');
    } 

}
