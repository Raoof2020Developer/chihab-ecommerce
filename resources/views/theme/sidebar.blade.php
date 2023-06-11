    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
          <div class="sidebar-brand-icon">
            CHIHAB SHOP
          </div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
          <a class="nav-link text-right" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <strong>لوحة التحكم</strong>
          </a>
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link text-right" href="{{route('admin.orders')}}">
          <i class="fas fa-book-open"></i>
            <span>الطلبات</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-right" href="#">
          <i class="fas fa-book-open"></i>
            <span>المبيعات</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-right" href="{{route('admin.products.index')}}">
          <i class="fas fa-book-open"></i>
            <span>المنتجات</span>
          </a>
        </li>
  
  
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>
      <!-- End of Sidebar -->