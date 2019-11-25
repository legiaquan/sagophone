<nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                
                <li class="dropdown nav-item">
                  <a class="nav-link position-relative"><b>Xin chào</b>
                    
                  @if(auth('admin')->user())
                    <?php $id_level = auth('admin')->user()->id_level;?> 
                    {{  getNameLevel($id_level) }} - 
                    {{ auth('admin')->user()->name }}
                  @endif
                  !</a>
                </li>
                
                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">User Settings</p></a>
                  <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">
                    <a href="javascript:;" class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>Thay đổi thông tin</span></a>
                    <div class="dropdown-divider"></div><a href="admin/dangxuat" class="dropdown-item"><i class="ft-power mr-2"></i><span>Đăng xuất</span></a>
                  </div>
                </li>
                
            </div>
          </div>
        </div>
      </nav>