@include('adminlte.header')


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-blue navbar-light" id="navmedia" media="print">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('/')}}" class="nav-link text-white">Home</a>

      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    {{-- right navbar --}}
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link text-white">Logout</a>
          </li>
      </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" media="print">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Condominium</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      {{-- end of sidebar Panel --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item">
          <a href="{{  url('contacts')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                ทำสัญญา
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
              <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-save"></i>
                    <p>
                        บันทึกค่าใช้จ่าย
                    </p>
              </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tint"></i>
                  <p>
                      บันทึกค่าน้ำ
                  </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-invoice"></i>
                  <p>
                      บิล
                  </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-invoice"></i>
                  <p>
                      สร้างบิล
                  </p>
            </a>
        </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                ข้อมูล
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ url('users')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลพนักงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('customers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลลูกค้า</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ url('buildings') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลตึก</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ url('rooms')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลห้องพัก</p>
                </a>
              </li>
                <li class="nav-item">
                    <a href="{{ url('datact')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>ข้อมูลสัญญา</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-sticky-note"></i>
              <p>
                รายงาน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานค่าห้อง</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานค่าห้องค้างจ่าย</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานแจ้งซ่อม</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tools"></i>
                  <p>
                      แจ้งซ่อม
                  </p>
            </a>
        </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12">


            @yield('content')




          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->








</div>
{{-- warpper from TOP --}}
@include('adminlte.script')
