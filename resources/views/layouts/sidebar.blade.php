
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
        
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                BaseLine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Societal Info
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                      <p>Population</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-header">Para Wise Info</li>

           <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Para Boundary
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('Para.Boundary.Basic.Info') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Para Basic Info</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('Para.Boundary.GPS.Point') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Para GPS Points</p>
                  </a>
                </li>

              </ul>
           </li>  

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

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>VCF Boundary
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('VCF.Boundary.Basic.Info') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>VCF Basic Info</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('VCF.Boundary.GPS.Point') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>VCF GPS Points</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('VCF.Boundary.Dominant.Plant') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>VCF Dominant Plants</p>
                  </a>
                </li>

              </ul>
           </li>
           
            

          <li class="nav-header">BaseLine</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Societal Entry
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Population.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text">Population</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('View.Entry.Household') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Household</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('View.Land.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Land</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('View.Occupation.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Occupation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('View.Livelihood.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Livelihood</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('View.Income.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('View.Expenditure.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expenditure</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('View.Economic.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Economic Status</p>
                </a>
              </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Education
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('View.EducationPart1.Entry') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>Part 1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('View.EducationPart2.Entry') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>Part 2</p>
                      </a>
                    </li>
                  </ul>
                </li>

              <li class="nav-item">
                <a href="{{ route('View.Health.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Health</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('View.Water.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Water</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('View.Sanitation.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sanitation</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('View.Accessibility.Entry') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accessibility</p>
                </a>
              </li>
             

            </ul>
          </li>
      <!-- societal view  -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Societal View 
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
           <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('View.Population') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Population</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ route('View.Household.Info') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Household</p>
                </a>
              </li>

            </ul>
          </li> -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Water Resources
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
           <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('View.Water.Resources.Entry1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry 1</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ route('View.Water.Resources.Entry2') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry 2</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('View.livestock.Entry') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Livestock
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Fisheries 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('View.Population') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Part 1</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ route('View.Household.Info') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Part 2</p>
                </a>
              </li>

              

            </ul>
          </li>

          

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