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
       
          
           <?php if ($_SESSION['name']=="sales" || $_SESSION['name']=="sales_head"): ?>
           <li class="treeview <?php if($currentPage =='dashboard' ){echo 'active';}?>">
          <a href="dashboard_sales.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
             <li class="treeview <?php if($currentPage =='addRentalQuotation' ){echo 'active';}?>">
          <a href="addRentalQuotation.php">
            <i  class="fa fa-edit"></i> <span>Rental Quotation</span>
          </a>
        </li>
            <li class="treeview <?php if($currentPage =='addSalesQuotation' ){echo 'active';}?>">
          <a href="addSalesQuotation.php">
            <i  class="fa fa-edit"></i> <span>Sales Quotation</span>
          </a>
        </li>
          
            <?php endif; ?>
           <?php if ($_SESSION['name']=="sales_head"): ?>
          
          <li class="treeview <?php if($currentPage =='viewall' ){echo 'active';}?>">
          <a href="dashboard_sales_head.php">
            <i  class="fa fa-edit"></i> <span>View All</span>
          </a>
        </li>
          
          
          <?php endif; ?>
      
     <?php if ($_SESSION['name']=="ops_planning"): ?>
          
          
           
             <li class="treeview <?php if($currentPage =='dashboard' ){echo 'active';}?>">
          <a href="dashboard_planning.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
          
             <li class="treeview <?php if($currentPage =='inventory' ){echo 'active';}?>">
          <a href="inventory.php">
            <i  class="fa fa-edit"></i> <span>Inventory</span>
          </a>
        </li>
          
          <?php endif; ?>
             <li class="treeview <?php if($currentPage =='logout' ){echo 'active';}?>">
          <a href="logout.php">
            <i  class="fa fa-back"></i> <span>Logout</span>
          </a>
        </li>
          
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
