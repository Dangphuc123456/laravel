 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('login') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">AdminBon</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-home"></i>
        <span>Trang chủ</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
   
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-box"></i>
        <span>Quản lý loại sản phẩm</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('admin.category.index')}}">Danh sách loại sản phẩm</a>
            <a class="collapse-item" href="{{route('admin.category.create')}}">Thêm loại sản phẩm</a>
        </div>
    </div>
</li>



<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-cookie"></i>
        <span>Quản lý sản phẩm</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('admin.product.index')}}">Danh sách sản phẩm</a>
            <a class="collapse-item" href="{{route('admin.product.create')}}">Thêm sản phẩm</a>
        </div>
    </div>
</li>
<!-- Nav Item nhanvien -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fa fa-user"></i>
        <span>Các mục khác</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('admin.employee.index')}}">Quản lý nhân viên</a>
            <a class="collapse-item" href="{{route('admin.employee.create')}}">Thêm nhân viên</a>
            <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid #DDDDDD;">
            <a class="collapse-item" href="{{route('admin.customer.index')}}">Quản lý khách hàng</a>
            <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid #DDDDDD;">
            <a class="collapse-item" href="{{route('admin.user.index')}}">Quản lý tài khoản</a>
            <a class="collapse-item" href="{{route('admin.user.create')}}">Thêm tài khoản</a>
            <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid #DDDDDD;">
            <a class="collapse-item" href="{{route('admin.slide.index')}}">Quản lý slide</a>
            <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid #DDDDDD;">
            <a class="collapse-item" href="{{route('admin.new.index')}}">Quản lý tin tức</a>
            <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid #DDDDDD;">
            <a class="collapse-item" href="{{route('admin.gioithieu.index')}}">Quản lý giới thiệu</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
        aria-expanded="true" aria-controls="collapseOrders">
        <i class="fa fa-shopping-cart"></i>
        <span>Quản lý đơn hàng</span>
    </a>
    <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.order.index') }}">Danh sách đơn hàng</a>
        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCarts"
        aria-expanded="true" aria-controls="collapseCarts">
        <i class="fa fa-shopping-cart"></i>
        <span>Quản lý giỏ hàng</span>
    </a>
    <div id="collapseCarts" class="collapse" aria-labelledby="headingCarts" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.cart.index') }}">Danh sách giỏ hàng</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContact"
        aria-expanded="true" aria-controls="collapseContact">
        <i class="fa fa-envelope"></i>
        <span>Quản lý liên hệ</span>
    </a>
    <div id="collapseContact" class="collapse" aria-labelledby="headingContact" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.contact.index') }}">Danh sách liên hệ</a>
        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupplier"
        aria-expanded="true" aria-controls="collapseSupplier">
        <i class="fa fa-industry"></i>
        <span>Quản lý nhà cung cấp</span>
    </a>
    <div id="collapseSupplier" class="collapse" aria-labelledby="headingSupplier" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.supplier.index') }}">Danh sách nhà cung cấp</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice"
        aria-expanded="true" aria-controls="collapseInvoice">
        <i class="fa fa-file-invoice"></i>
        <span>Quản lý hóa đơn nhập</span>
    </a>
    <div id="collapseInvoice" class="collapse" aria-labelledby="headingInvoice" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.hoadonnhap.index') }}">Danh sách hóa đơn nhập</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStatistics"
        aria-expanded="true" aria-controls="collapseStatistics">
        <i class="fa fa-chart-line"></i>
        <span>Thống kê bán hàng</span>
    </a>
    <div id="collapseStatistics" class="collapse" aria-labelledby="headingStatistics" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.thongke.index') }}">Xem thống kê</a>
        </div>
    </div>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<!-- <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

</ul>
<!-- End of Sidebar -->