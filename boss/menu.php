
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="../admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Document</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../admin/m_img/<?php echo $_SESSION['m_img']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="index.php" class="d-block"><?php echo $_SESSION['m_name']; ?></a>

      </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        
        <li class="nav-header">Documentation</li>
        <li class="nav-item">
          <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="member.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>แก้ไขข้อมูลส่วนตัว</p>
          </a>
        </li>
        <li class="nav-item menu-is-opening menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
             เอกสาร
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">3</span>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: block;">

            <li class="nav-item">
              <a href="doc.php" class="nav-link <?php if($menu=="doc"){echo "active";} ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>เอกสารรวม</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="doc_department.php" class="nav-link <?php if($menu=="doc_depart"){echo "active";} ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>เอกสารเฉาะแผนก</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="doc_member.php" class="nav-link <?php if($menu=="doc_mem"){echo "active";} ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>เอกสารเฉาะบุคคล</p>
              </a>
            </li>
           
            </li>
          </ul>
        </li>
        
        <li class="nav-header">ออกจากระบบ</li>
        <li class="nav-item">
          <a href="../logout.php" class="nav-link"  onclick="return confirm('ยืนยันออกจากระบบ !!');">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">ออกจากระบบ</p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>