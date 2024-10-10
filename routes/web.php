<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\GioithieuController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\CartsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HoadonnhapController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ThongkeCotroller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrdersController;
use App\Http\Controllers\Admin\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'CartController@ind');

Route::prefix('admin')->group(function () {
    Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/dashboard', [AdminController::class, 'showdashboard'])->name('dashboard');
});


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/destroy/{CatID}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/show/{CatID}', [CategoryController::class, 'show'])->name('category.detail');
    Route::get('/edit/{CatID}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{CatID}', [CategoryController::class, 'update'])->name('category.update');
});
Route::prefix('admin')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/destroy/{ProID}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/show/{ProID}', [ProductController::class, 'show'])->name('admin.product.detail');
    Route::get('/product/edit/{ProID}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/product/update/{ProID}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
});
Route::prefix('admin')->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index'])->name('admin.employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/destroy/{EmpID}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('/employee/show/{EmpID}', [EmployeeController::class, 'show'])->name('admin.employee.detail');
    Route::get('/employee/edit/{EmpID}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
    Route::put('/employee/update/{EmpID}', [EmployeeController::class, 'update'])->name('employee.update');
});


Route::prefix('admin')->group(function () {
    Route::get('/supplier', [SupplierController::class, 'index'])->name('admin.supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('admin.supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::get('/supplier/show/{id}', [SupplierController::class, 'show'])->name('admin.supplier.detail');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('admin.supplier.edit');
    Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
});

Route::prefix('admin')->group(function () {
    Route::get('/hoadonnhap', [HoadonnhapController::class, 'index'])->name('admin.hoadonnhap.index');
    Route::get('/hoadonnhap/create', [HoadonnhapController::class, 'create'])->name('admin.hoadonnhap.create');
    Route::post('/hoadonnhap/store', [HoadonnhapController::class, 'store'])->name('hoadonnhap.store');
    Route::get('/hoadonnhap/destroy/{idNhap}', [HoadonnhapController::class, 'destroy'])->name('hoadonnhap.destroy');
    Route::get('/hoadonnhap/show/{idNhap}', [HoadonnhapController::class, 'show'])->name('admin.hoadonnhap.detail');
    Route::get('/hoadonnhap/edit/{idNhap}', [HoadonnhapController::class, 'edit'])->name('admin.hoadonnhap.edit');
    Route::put('/hoadonnhap/update/{idNhap}', [HoadonnhapController::class, 'update'])->name('hoadonnhap.update');
});

Route::prefix('admin')->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/customer/destroy/{CusID}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
});

Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
});

Route::prefix('admin')->group(function () {
    Route::get('/slide', [SlideController::class, 'index'])->name('admin.slide.index');
    Route::get('/slides', [SlideController::class, 'showSlide']);
    Route::get('/slide/edit/{idanh}', [SlideController::class, 'edit'])->name('admin.slide.edit');
    Route::put('/slide/update/{idanh}', [SlideController::class, 'update'])->name('slide.update');
});

Route::prefix('admin')->group(function () {
    Route::get('/new', [NewController::class, 'index'])->name('admin.new.index');
    Route::get('/new/edit/{id}', [NewController::class, 'edit'])->name('admin.new.edit');
    Route::put('/new/update/{id}', [NewController::class, 'update'])->name('tt.update');
    Route::get('/new/show/{id}', [NewController::class, 'show'])->name('admin.new.detail');
});

Route::prefix('admin')->group(function () {
    Route::get('/gioithieu', [GioithieuController::class, 'index'])->name('admin.gioithieu.index');
    Route::get('/gioithieu/edit/{id}', [GioithieuController::class, 'edit'])->name('admin.gioithieu.edit');
    Route::put('/gioithieu/update/{id}', [GioithieuController::class, 'update'])->name('gt.update');
    Route::get('/gioithieu/show/{id}', [GioithieuController::class, 'show'])->name('admin.gioithieu.detail');
});


Route::prefix('admin')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/contact/show/{id}', [ContactController::class, 'show'])->name('admin.contact.detail');
    Route::get('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('/contact/new', [ContactController::class, 'newcontact'])->name('admin.contact.newcontact');
});

Route::prefix('admin')->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order.index');
    Route::post('/order/confirm/{id}', [OrderController::class, 'confirm'])->name('admin.order.confirm');
    Route::delete('/order/{id}/cancel', [OrderController::class, 'cancel'])->name('admin.order.cancel');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('admin.order.show');
    Route::post('/order/delivered/{id}', [OrderController::class, 'delivered'])->name('admin.order.delivered');
    Route::post('/order/delivery/{id}', [OrderController::class, 'delivery'])->name('admin.order.delivery');

});
// Route::prefix('admin')->group(function () {
//     Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
//     Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//     Route::middleware(['auth', 'role:employee'])->group(function () {
//         Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
//     });
// });



Route::prefix('admin')->group(function () {
    Route::get('/cart', [CartsController::class, 'index'])->name('admin.cart.index');
    Route::get('/cart/show/{CartID}', [CartsController::class, 'show'])->name('admin.cart.detail');
    Route::get('/admin/cart/detail/{CusID}', [CartsController::class, 'showCustomerCartDetail'])->name('admin.cart.detail');
});
Route::prefix('admin')->group(function () {
    Route::get('/thongke', [ThongkeCotroller::class, 'index'])->name('admin.thongke.index');
});


Route::get('/', [HomeController::class, 'index'])->name('user');
Route::get('/home', [HomeController::class,  'index'])->name('home');
Route::get('/GioiThieu', [HomeController::class,  'gioiThieu'])->name('gioiThieu');
Route::get('/category/{CatID}', [HomeController::class,  'danhMuc'])->name('danhMuc');
Route::get('/SanPham', [HomeController::class,  'sanPham'])->name('sanPham');
Route::get('/detail/{ProID}', [HomeController::class,  'detail'])->name('detail');
Route::get('/ThanhToan', [HomeController::class,  'thanhToan'])->name('thanhToan');
Route::post('/customer/store', [HomeController::class,  'store'])->name('customer.store');
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('/TinTuc', [HomeController::class, 'tinTuc'])->name('tinTuc');
Route::get('/chitietTinTuc/{id}', [HomeController::class, 'detailtinTuc'])->name('detailtinTuc');
Route::get('/contact', [HomeController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');
Route::get('/thongtin', [HomeController::class, 'thongtin'])->name('thongtin');
Route::get('/best-selling', [HomeController::class, 'bestSelling'])->name('user.home.bestSelling');
Route::get('/lienhe', [HomeController::class, 'lienhe'])->name('lienHe');


Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    // Route::get('/order/{id}/detail', [OrderController::class, 'showcart'])->name('order.detail');
    Route::get('/order/{ordID}/detail', [OrdersController::class, 'getOrderDetail'])->name('order.detail');
});


// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'role:customer'])->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home');
// });

// Route cho đăng nhập
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route cho đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::get('/GioHang', [CartController::class,  'gioHang'])->name('gioHang');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/show-cart', [CartController::class, 'showCart'])->name('showCart');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('/customer/store', [CartController::class,  'store'])->name('store');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/thanh-toan', [CartController::class, 'thanhToan'])->name('thanhToan');
Route::get('/thongtin', [CartController::class, 'thongtin'])->name('thongtin');
Route::post('/store', [CartController::class, 'store'])->name('store');



use App\Http\Controllers\User\ReservationController;

Route::get('/reservation', [ReservationController::class, 'showForm'])->name('reservation.show');
Route::post('/reservation', [ReservationController::class, 'submitForm'])->name('reservation.submit');
