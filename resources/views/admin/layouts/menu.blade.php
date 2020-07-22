<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hotel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">One Ninght</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('admin/thongke') ? 'active' : null}}">
        <a class="nav-link" href="{{route('thongke')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống Kê</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/user/*') ? 'active' : null}}">
        <a class="nav-link" href="{{route('user')}}">
            <i class="fas fa-users"></i>
            <span>Ngưởi Dùng</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Quản Lý Phòng
    </div>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/loaiphong/*') ? 'active' : null}} {{ Request::is('admin/phong/*') ? 'active' : null}} {{ Request::is('admin/tang/*') ? 'active' : null}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-hotel"></i>
            <span>Phòng</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('tang')}}">Tầng</a>
                <a class="collapse-item" href="{{route('loaiphong')}}">Loại Phòng</a>
                <a class="collapse-item" href="{{route('phong')}}">Phòng</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::is('admin/danhsachdp/*') ? 'active' : null}}">
        <a class="nav-link" href="{{route('danhsachdp')}}">
            <i class="fas fa-clipboard-list"></i>
            <span>Danh Sách Đặt Phòng</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Thông Tin Khách Sạn
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/loaibaiviet/*') ? 'active' : null}} {{ Request::is('admin/baiviet/*') ? 'active' : null}}  {{ Request::is('admin/thongtinkhachsan/gioithieu') ? 'active' : null}} {{ Request::is('admin/thongtinkhachsan/thongtin') ? 'active' : null}} {{ Request::is('admin/dichvu/*') ? 'active' : null}} " >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-newspaper"></i>
            <span>Bài Viết</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('loaibaiviet')}}">Loại Tin Tức</a>
                <a class="collapse-item" href="{{route('baiviet')}}">Tin Tức</a>
                <a class="collapse-item" href="{{route('dichvu')}}">Dịch Vụ</a>
                <a class="collapse-item" href="{{route('gioithieu')}}">Giới Thiệu</a>
                <a class="collapse-item" href="{{route('thongtin')}}">Thông Tin Khách Sạn</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/slide/*') ? 'active' : null}} {{ Request::is('admin/anhkhachsan/*') ? 'active' : null}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-image"></i>
            <span>Ảnh Khách Sạn</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('slide')}}">Slide</a>
                <a class="collapse-item" href="{{route('anhkhachsan')}}">Ảnh Khám Phá</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Ý Kiến Khách Hàng
    </div>
     <li class="nav-item {{ Request::is('admin/ykienlienhe/*') ? 'active' : null}}">
        <a class="nav-link" href="{{route('danhsachykien')}}">
            <i class="fas fa-id-card"></i>
            <span>Ý Kiến</span>
        </a>
    </li>

    <!-- Nav Item - Charts -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
