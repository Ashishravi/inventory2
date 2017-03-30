<?php include ("includes/header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Add New Item</span>
                   <a href="new_item.php" class="btn btn-sm btn-info btn-flat pull-left">New Item</a>
      <!-- Modal -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Add New Bundle</span>
             <a href="new_bundle.php" class="btn btn-sm btn-info btn-flat pull-left">New Bundle</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Add New Location</span>
             <a href="new_location.php" class="btn btn-sm btn-info btn-flat pull-left">New Location</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Get Inventory Info at Location</h3>
            </div>
            <!-- /.box-header -->
            
             
              <div class="box-body">
                  <div id="from_div">
                <form method="post" action="showItems.php">
                    <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="location">Select Location</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="location" id="location">
                         <option value="" selected disabled>Please select</option>
                       <?php
                       $location = mysqli_query($con, "SELECT location_id, location_name FROM table_location");
		           		foreach ($location as $row) { ?>
                       <option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                  
                    <button class="btn btn-success addmore" type="submit" name="location_query">Query</button>
                    
                     <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="job_order">Select Job Order No</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="job_order" id="job_order">
                         <option value="" selected disabled>Please select</option>
                       <?php
                       $job_orders = mysqli_query($con, "SELECT job_order FROM orders");
		           		foreach ($job_orders as $row) { ?>
                       <option value="<?php echo $row['job_order'] ?>"><?php echo $row['job_order'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                    <button class="btn btn-success addmore" type="submit" name="job_order_query">Query</button>
                    </div>
                 </form> 
                  
            </div>
             
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
       <!-- <div class="col-md-4">
         
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Godown Products</h3>
            </div>
            
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php 
                $sql = mysqli_query($con, "SELECT * FROM godown_inventory LIMIT 5");
                while($values = mysqli_fetch_array($sql))
                {
                ?>
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo $values['itemcord']; ?>
                      <span class="label label-warning pull-right"><?php echo $values['type']; ?></span></a>
                        <span class="product-description">
                          <?php echo $values['quantity']; ?>
                        </span>
                  </div>
                </li>
                <?php } ?>
              
              </ul>
            </div>
           
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
       
          </div>
   
        </div>-->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include ("includes/footer.php"); ?>