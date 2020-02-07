 <!-- Page Wrapper -->
 <div id="wrapper">
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <!-- Access menu for Admin -->
     <?php if ($_SESSION['userInfo']['user_role'] === '1') :?>
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
       </a>
       <!-- Divider -->
       <hr class="sidebar-divider my-0">
       <!-- Nav Item - Dashboard -->

       <!-- Divider -->
       <hr class="sidebar-divider">
       <!-- Heading -->
       <!-- <div class="sidebar-heading">
         Interface
       </div> -->
       <!-- Nav Item - Utilities Collapse Menu -->
       <!-- <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
           <i class="fa fa-industry" aria-hidden="true"></i>
           <span>Create Company</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Create Company</h6>
             <a class="collapse-item" href="<?php echo base_url('Home/create_company') ?>">Create Company</a>
           </div>
         </div>
       </li> -->

       <!-- <hr class="sidebar-divider"> -->

       <!-- Nav Item - Create user Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="true" aria-controls="collapseusers">
           <i class="fa fa-user" aria-hidden="true"></i>
           <span>Create Users</span>
         </a>
         <div id="collapseusers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Create User</h6>
             <!-- <a class="collapse-item" href="<?php echo base_url('Home/c_users/').$_SESSION['userInfo']['id'] ?>">Users</a> -->
             <a class="collapse-item" href="<?php echo base_url('admin/users')?>">Users</a>
           </div>
         </div>
       </li>

       <!-- <hr class="sidebar-divider"> -->
       <!-- Heading -->

       <!-- Nav Item - Utilities Collapse Menu
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseU" aria-expanded="true" aria-controls="collapseU">
           <i class="fas fa-fw fa-wrench"></i>
           <span>ISO 27001 Gap Anls. Tool</span>
         </a>
         <div id="collapseU" class="collapse" aria-labelledby="headingU" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">ISO 27001</h6>
             <a class="collapse-item" href="<?php echo base_url('Loginauth/ISO_27001_gap_analysis') ?>">ISO 27001 Gap Anls. Tool</a>
           </div>
         </div>
       </li> -->
       <hr class="sidebar-divider">
       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
           <i class="fas fa-fw fa-table"></i>
           <span>Comapany List</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Comapany List</h6>
             <a class="collapse-item" href="<?php echo base_url('admin/company-list') ?>">Comapany List</a>
           </div>
         </div>
       </li>
       <!--ACCESS MENUS FOR Process-->
 

     <?php elseif ($_SESSION['userInfo']['user_role'] === '0') : ?>
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
       </a>
       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Divider -->
       <!-- <hr class="sidebar-divider"> -->

       <!-- Nav Item - Utilities Collapse Menu
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesp" aria-expanded="true" aria-controls="collapseUtilitiesp">
           <i class="fas fa-fw fa-table"></i>
           <span>Backend Orders</span>
         </a>
         <div id="collapseUtilitiesp" class="collapse " aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Jobs:</h6>
             <a class="collapse-item" href="<?php echo base_url('backend/online/jc-list') ?>">Orders</a>
             <a class="collapse-item" href="<?php echo base_url('backend/online/rejcted/jc-list') ?>">Rejected orders</a>

             <a class="collapse-item" href="<?php echo base_url('backend/online/complete/jc') ?>">Printed Orders</a>
           </div>
         </div>
       </li> -->
       <!-- <hr class="sidebar-divider"> -->
       <!-- <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiespord" aria-expanded="true" aria-controls="collapseUtilitiespord">
           <i class="fas fa-fw fa-table"></i>
           <span>Prduction Advice</span>
         </a>
         <div id="collapseUtilitiespord" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Jobs:</h6>
             <a class="collapse-item" href="<?php echo base_url('backend/production-advise/jc-list') ?>">Job card list</a>

             <a class="collapse-item" href="<?php echo base_url('backend/production-advise/complete/jc') ?>">Printed job card</a>
           </div>
         </div>
       </li> -->

       <!--ACCESS MENUS FOR QC1-->

       <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
       </a>
       <!-- Divider 
       <hr class="sidebar-divider my-0"> -->

     <?php endif; ?>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
       <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
   </ul>
   <!-- End of Sidebar -->
   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

       <!-- Topbar -->
       <nav id="navbar" class="navbar navbar-expand navbar-dark text-white bg-dark topbar static-top shadow ">

         <!-- Sidebar Toggle (Topbar) -->
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
           <i class="fa fa-bars"></i>
         </button>

         <!-- Topbar Search -->
         <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0  navbar-search">
           <div class="input-group">
           <a href="<?php echo base_url('admin') ?>">  <img class="h-25" src="<?php echo base_url('assets/img/logoiso27001.png') ?>" alt="Logo"></a>
           </div>
         </form>
         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">
           <!-- Nav Item - Messages -->
           <!-- <div class="topbar-divider d-none d-sm-block"></div>
           <div class="row h-40">
             <div class="bg-success col-sm-2"></div> Printed JobCard
             <div class="bg-primary col-sm-2">"</div>
             <div class="bg-danger col-sm-2">"</div>
             </div> -->

           <div class="topbar-divider d-none d-sm-block"></div>
           <!-- <ul class="nav justify-content-center">
             <li class="nav-item">
               <a class="nav-link text-dark active" href="<?php echo base_url('#') ?>">Queue Jobs</a>
             </li>
            
             <li class="nav-item">
               <a class="nav-link text-dark"  href="<?php echo base_url('#') ?>">Compete Jobs</a>
             </li>
           </ul> -->
           <!-- <div class="topbar-divider d-none d-sm-block"></div> 
           <div>-->


           <!-- Nav Item - User Information -->
           <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userInfo']['username'];; ?></span>
               <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/admin.png') ?>">
             </a>
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <!-- <a class="dropdown-item" href="#">
                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                 Profile
               </a>
               <a class="dropdown-item" href="#">
                 <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                 Settings
               </a>
               <a class="dropdown-item" href="#">
                 <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                 Activity Log
               </a> -->
               <!-- <div class="dropdown-divider"></div> -->
               <a class="dropdown-item" href="<?php echo base_url('Login/logout') ?>">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Logout
               </a>
             </div>
           </li>
         </ul>
       </nav>