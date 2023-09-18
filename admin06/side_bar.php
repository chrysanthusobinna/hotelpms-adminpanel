
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../images/velitechs_logo.png" alt=" Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $velitech_software_name; ?> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images/hotel_logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $site_title; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
          <li class="nav-item">
            <a href="index.php" class="nav-link" id="dashboard">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
 
 
 <?php 		if(($main_role_x == 'front_desk_staff') || ($main_role_x == 'general_admin')) { ?>
 
          <li class="nav-item has-treeview">
            <a href="manage_bookings.php" class="nav-link" id="manage_bookings">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Bookings
               </p>
            </a>
          </li>

 
          <li class="nav-item has-treeview">
            <a href="manage_room_maintenance.php" class="nav-link" id="manage_room_maintenance">
              <i class="nav-icon fas fa-tools"></i>  
              <p>
                Room Maintenance
               </p>
            </a>
          </li>
		  
 <?php } ?>


 <?php 		if(($main_role_x == 'sales_staff') || ($main_role_x == 'general_admin')){ ?>
		  
         <li class="nav-item has-treeview">
            <a href="manage_sales_record.php" class="nav-link" id="manage_sales_record">
              <i class="nav-icon fas fa-shopping-cart"></i> 
              <p>
                Sales Record
               </p>
            </a>
          </li>
 
 <?php } ?>
 
 



    <?php 	if($main_role_x == 'general_admin') { ?>
           <li class="nav-item has-treeview">
            <a href="manage_staff_roles.php" class="nav-link" id="manage_staff_roles">
              <i class="nav-icon fas fa-user-shield"></i>  
              <p>
                Manage Staff Roles
               </p>
            </a>
          </li>
 
    <?php } ?>


   <?php 	if(($access_website_management_x == '1') || ($main_role_x == 'general_admin')) { ?>
 
            <li class="nav-item has-treeview" id="manage_website_menu"> 
            <a href="#" class="nav-link" id="manage_website">
              <i class="nav-icon fas fa-globe"></i> 
              <p>
                Manage Web Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="manage_blog.php" class="nav-link" id="manage_blog">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_gallery.php" class="nav-link" id="manage_gallery">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gallery</p>
                </a>
              </li>
			  
     	  
 			  
           </ul>
          </li>
 
   <?php } ?>
 
 
 
 
     <?php 		if($main_role_x == 'general_admin') { ?>


           <li class="nav-item has-treeview">
            <a href="all_settings.php" class="nav-link" id="all_settings">
              <i class="nav-icon fas fa-cog"></i>  
              <p>
                All Settings
               </p>
            </a>
          </li>
		  
		   
 
	 <?php } ?>


         <li class="nav-item has-treeview">
            <a onclick="if (confirm('Are you Sure you want to Log out Now?')){return true;}else{event.stopPropagation(); event.preventDefault();};"    href="logout.php" class="nav-link">
			  <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
               </p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
