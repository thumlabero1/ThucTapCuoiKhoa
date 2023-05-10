 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/admin/main" class="brand-link">
         <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="/admin" class="d-block">@if (Auth::user())
                 {{ Auth::user()->name }}
                    @endif
                 </a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fa fa-bars" aria-hidden="true"></i>
                         <p>
                             Danh mục sản phẩm
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/menus/add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm danh mục</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/menus/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách danh mục</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fa fa-home" aria-hidden="true"></i>
                         <p>
                             Sản phẩm
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/products/add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm sản phẩm</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/products/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách sản phẩm</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fa fa-camera" aria-hidden="true"></i>
                         <p>
                             Slider
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/sliders/add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm Slider</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/sliders/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách slider</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fa fa-window-maximize" aria-hidden="true"></i>
                         <p>
                             Danh mục bài viết
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/category-blog/add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm danh mục</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/category-blog/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách danh mục</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fa fa-building" aria-hidden="true"></i>
                         <p>
                             Bài viết
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/blogs/add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm bài viết</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/blogs/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách bài viết</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                         <p>
                             Đơn đặt hàng
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">

                         <li class="nav-item">
                             <a href="/admin/orders/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách đơn đặt hàng</p>
                             </a>
                         </li>

                     </ul>
                 </li>




                 <li class="nav-item">
                     <a href="#" class="nav-link">
                     <i class="fas fa-users"></i>
                         <p>
                             Nhân viên
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/employees/add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm nhân viên</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/employees/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách nhân sự</p>
                             </a>
                         </li>

                     </ul>
                 </li>




             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
