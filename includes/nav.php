  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user_id']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?php if($currentPage =='dashboard' ){echo 'active';}?>">
          <a href="dashboard_sales.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
          
           <?php if ($_SESSION['name']=="orders"): ?>
            <li class="treeview <?php if($currentPage =='addorder' ){echo 'active';}?>">
          <a href="addorder.php">
            <i  class="fa fa-edit"></i> <span>Add Order</span>
          </a>
        </li>
            <?php endif; ?>
      
     
          
          
           <?php if ($_SESSION['name']=="finance"): ?>
          
        <li class="treeview <?php if($currentPage =='pending' || $currentPage =='finished'){echo 'active';}?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>View Orders</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($currentPage =='finished'){echo 'active';}?>"><a href="finished.php"><i class="fa fa-circle-o"></i> Approved Orders</a></li>
            <li class="<?php if($currentPage =='pending'){echo 'active';}?>"><a href="pending.php"><i class="fa fa-circle-o"></i> New Orders</a></li>
              <li class="<?php if($currentPage =='dispatched'){echo 'active';}?>"><a href="dispatched.php"><i class="fa fa-circle-o"></i> Dispatched Orders</a></li>
          </ul>
        </li>
          
            <li class="treeview <?php if($currentPage =='accounts' ){echo 'active';}?>">
          <a href="accounts.php">
            <i class="fa fa-dashboard"></i> <span>Accounts</span>
          </a>
        </li>
           <?php endif; ?>
            
          
             <li class="treeview <?php if($currentPage =='inventory' ){echo 'active';}?>">
          <a href="inventory.php">
            <i  class="fa fa-edit"></i> <span>Inventory</span>
          </a>
        </li>
          
          
             <li class="treeview <?php if($currentPage =='logout' ){echo 'active';}?>">
          <a href="logout.php">
            <i  class="fa fa-back"></i> <span>Logout</span>
          </a>
        </li>
          
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
