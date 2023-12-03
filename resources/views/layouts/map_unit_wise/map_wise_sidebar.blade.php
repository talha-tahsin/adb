
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="{{ mix('resources/dist/img/cegis.png') }}" alt="Logo" class="brand-image img-circle elevation-3" height="80" width="40" style="opacity: .8;"> -->
      <img src="{{ mix('resources/dist/img/cegis_namplate.png') }}" alt="Logo" class="elevation-3" height="32" width="220" style="opacity: .8;">
      <!-- <span class="brand-text font-weight-light">CEGIS</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard <i class="right fas fa-angle-left"></i></p>
            </a>
          </li> -->

        @if(Auth::user()->role == 'admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> <strong style="color: #FF4500;">Admin</strong> </p>
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              <!-- </p> -->
            </a>
           <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('userPanel') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text">User Panel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create <small>(Chart of Accounts)</small></p>
                </a>
              </li>
            </ul>
          </li>
        @endif 

        
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user' || Auth::user()->role == 'entry')
        
          <li class="nav-header">Map Unit Wise</li>

           

          <!-- <li class="nav-header">Para Boundary</li>
            <li class="nav-item">
              <a href="{{ route('Para.Boundary.Basic.Info') }}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>Table P1 : Basic Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Para.Boundary.GPS.Point') }}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>Table P2 : GPS Points</p>
              </a>
            </li> -->

            
           
           <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>LULC Validation
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview"> -->
                <li class="nav-item">
                  <a href="{{ route('Ground.Truth.First') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>First Ground Truth</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('Ground.Truth.Second') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Seceond Ground Truth</p>
                  </a>
                </li>

              <!-- </ul>
           </li>  -->

           <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Agro Ecological
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview"> -->
                
                <li class="nav-item">
                  <a href="{{ route('Land.Degradation') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Land Degradation</p>
                  </a>
                </li>

              <!-- </ul>
           </li>  -->


        @endif 

        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'test')
          <li class="nav-header">Reports</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                View Ledger
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Income Tax
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          @endif


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>