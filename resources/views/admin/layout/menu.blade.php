<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="white" data-background-color="purple-bliss" data-image="admin_asset/app-assets/img/sidebar-bg/06.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="admin/trang-chu.html" class="logo-text float-left">
              <div class="logo-img"><img src="admin_asset/app-assets/img/logo.png"/></div><span class="text align-middle">Admin</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="collapsed" class="ft-toggle-left toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class="nav-item"><a href="admin/trang-chu.html"><i class="ft-home"></i><span data-i18n="" class="menu-title">Trang chủ</span></a>
              </li>
              @if(auth('admin')->user()->id_level == 2 || auth('admin')->user()->id_level == 7)
              <!-- Quản lý sản phẩm -->
              <li class="has-sub nav-item"><a><i class="ft-aperture"></i><span data-i18n="" class="menu-title">Quản lý sản phẩm</span></a>
                <ul class="menu-content">
                  <li class="has-sub"><a ><i class="ft-pocket"></i><span data-i18n="" class="menu-title">Hãng ĐT</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/hangdt/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/hangdt/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>
                  <li class="has-sub"><a ><i class="ft-copy"></i><span data-i18n="" class="menu-title">Nhóm SP</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/nhomsanpham/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/nhomsanpham/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>
                  <li class="has-sub"><a ><i class="ft-image"></i><span data-i18n="" class="menu-title">Bảng màu</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/mau/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/mau/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>
                  <li class="has-sub"><a ><i class="ft-smartphone"></i><span data-i18n="" class="menu-title">Sản phẩm</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/sanpham/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/sanpham/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>
                  <!-- <li class="nav-item"><a href="admin/chitietsanpham/danhsach"><i class="ft-eye"></i><span data-i18n="" class="menu-title">Hiển thị SP</span></a>
                    
                  </li> -->
                </ul>
              </li>
              @endif
              <!-- End of Quản lý sản phẩm -->
              @if(auth('admin')->user()->id_level == 6 || auth('admin')->user()->id_level == 7)
              <!-- Khuyến mãi -->
              <li class="has-sub"><a ><i class="ft-bookmark"></i><span data-i18n="" class="menu-title">Khuyến mãi</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/banner/danhsach" class="menu-item">Banner</a></li>
                      <li><a href="admin/banner/them" class="menu-item">Thêm banner</a></li>
                      
                    </ul>
              </li>
              <!-- End of Khuyến mãi -->
              <!-- comment -->
              <li class="has-sub nav-item"><a ><i class="ft-message-circle"></i><span data-i18n="" class="menu-title">Quản lý Comment</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/comment-san-pham/danhsach" class="menu-item">Sản phẩm</a></li>
                    </ul>
                  </li>
              <!-- End of comment -->
              <!-- Đơn hàng -->
              <li class="has-sub nav-item"><a ><i class="ft-shopping-cart"></i><span data-i18n="" class="menu-title">Đơn hàng</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/donhang/danhsach" class="menu-item">Danh sách</a></li>
                    </ul>
                  </li>
              <!-- End of Đơn hàng -->
              <!-- Tin tức -->
              <li class="has-sub nav-item"><a><i class="ft-file-text"></i><span data-i18n="" class="menu-title">Quản lý tin tức</span></a>
                <ul class="menu-content">
                  <li class="has-sub"><a ><i class="ft-file-text"></i><span data-i18n="" class="menu-title">Tin tức</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/tintuc/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/tintuc/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>
                  <li class="has-sub"><a ><i class="ft-file-text"></i><span data-i18n="" class="menu-title">Loại tin</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/loaitin/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/loaitin/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>  
                </ul>
              </li>
              <!-- End of Tin tức -->
              @endif
              <!-- Thành viên -->
              @if(auth('admin')->user()->id_level == 2 || auth('admin')->user()->id_level == 7)
              <li class="has-sub nav-item"><a ><i class="ft-users"></i><span data-i18n="" class="menu-title">Thành viên</span></a>
                <ul class="menu-content">
                  <li><a href="admin/thanhvien/danhsach" class="menu-item">Danh sách</a></li>
                  <li><a href="admin/thanhvien/them" class="menu-item">Thêm</a></li>
                </ul>
              </li>
              @endif
              <!-- End of Thành viên -->

              <!-- Nhân viên -->
              @if(auth('admin')->user()->id_level == 1 || auth('admin')->user()->id_level == 7)
              <li class="has-sub nav-item"><a><i class="ft-gitlab"></i><span data-i18n="" class="menu-title">Quản lý nhân viên</span></a>
                <ul class="menu-content">
                  <li class="has-sub nav-item"><a ><i class="ft-award"></i><span data-i18n="" class="menu-title">Chức vụ</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/level/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/level/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>
                  <li class="has-sub nav-item"><a ><i class="ft-user"></i><span data-i18n="" class="menu-title">Nhân viên</span></a>
                    <ul class="menu-content">
                      <li><a href="admin/nhanvien/danhsach" class="menu-item">Danh sách</a></li>
                      <li><a href="admin/nhanvien/them" class="menu-item">Thêm</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              @endif
              <!-- End of Nhân viên -->
            
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>