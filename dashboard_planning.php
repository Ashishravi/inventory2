<?php include ("includes/header.php");?>
<?php 
$location = mysqli_query($con, "SELECT location_id, address FROM table_location");
$challan_type = mysqli_query($con, "SELECT * FROM table_challan_category");
?>
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
      <div class="col-md-4 col-sm-4 col-xs-12">
           <button type="button" class="btn btn-block btn-primary pull-right" data-toggle="modal" data-button="delete" data-target="#newChallan"><i class="fa fa-edit"></i>New Challan</button>
          <!-- /.info-box -->
        </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>
            </div>
            <!-- /.box-header -->
      
           
                
                 <div class="box-body">
              <table id="godown" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Job Order</th>
                  <th>Date of Delivery/Pickup</th>
                  <th>Attachments</th>
                  <th>Print</th>
                  <th>Documents</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = mysqli_query($con,"SELECT * FROM orders WHERE status = 1");
                while($result = mysqli_fetch_array($sql))
                {
                ?>
                <tr>
                    
                 <td><?php echo $result['job_order'] ?></td>
                 <td><?php echo $result['date'] ?></td>
                 <td><a class="btn btn-block btn-default" href="vieworder.php?id=<?php echo $result['id']; ?>"><i class="fa fa-eye"></i> View</a></td>
                 <td>
                    <form action="view_challan.php?id=<?php echo $result['job_order']; ?>" method="post">
                     <?php 
                    error_reporting(E_ALL); ini_set('display_errors', 1);
                        $get_challan = "SELECT DISTINCT challan_id FROM challan_item_relation WHERE job_order = '".$result['job_order']."'";
                  //  echo $get_challan;
                   $challan_ids = mysqli_query($con,$get_challan);
                        ?>
                        
                           <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="challan_type">ID</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="challan_id" id="challan_id" required>
                         <option value="" selected disabled>Please select</option>
                       <?php
		           		foreach ($challan_ids as $row) { ?>
                       <option value="<?php echo $row['challan_id'] ?>"><?php echo $row['challan_id'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                        <button class="btn btn-block btn-default" type="submit" name="formpdf_btn"><i class="fa fa-print"></i> Print</button>
                     </form>
                    
                    </td>
                <td>
                  
                    <a class="btn btn-block btn-default" href="addForm.php?id=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i> Add Form</a></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                   <th>Job Order</th>
                   <th>Date of Delivery/Pickup</th>
                   <th>Attachments</th>
                   <th>Documents</th>
                </tr>
                </tfoot>
              </table>
            </div>
      
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
   
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class="modal fade" id="newChallan" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="approveModalLabel">
                    Confirmation Details
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
               
                <form class="form-horizontal" role="form" method="post" action="new_challan.php">
                 
                     <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="pickup_location">Pickup Location</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="pickup_location" id="pickup_location" required>
                         <option value="" selected disabled>Please select</option>
                       <?php
		           		foreach ($location as $row) { ?>
                       <option value="<?php echo $row['location_id'] ?>"><?php echo $row['address'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                     <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="delivery_location">Delivery Location</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="delivery_location" id="delivery_location" required>
                         <option value="" selected disabled>Please select</option>
                       <?php
		           		foreach ($location as $row) { ?>
                       <option value="<?php echo $row['location_id'] ?>"><?php echo $row['address'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                     <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="challan_type">Challan Type</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="challan_type" id="challan_type" required>
                         <option value="" selected disabled>Please select</option>
                       <?php
		           		foreach ($challan_type as $row) { ?>
                       <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                       <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="job_order">Select Job Order No</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="job_order" id="job_order">
                         <option value="" selected disabled>Please select</option>
                       <?php
                       $job_orders = mysqli_query($con, "SELECT job_order FROM orders WHERE status = 1");
		           		foreach ($job_orders as $row) { ?>
                       <option value="<?php echo $row['job_order'] ?>"><?php echo $row['job_order'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                <input name="orderId" type="number" value="<?php echo $_GET['id'] ?>" class="hidden" />
                <input type="submit" name="new_challan" id="submit-form"  />
                </form>   
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<?php include ("includes/footer.php"); ?>