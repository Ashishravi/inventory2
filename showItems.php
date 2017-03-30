<?php include ("includes/header.php");?>
<?php 

$location_id = "";
$job_order_no = "";
$order_query;
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <?php if(isset($_POST['location_query'])){
    $sql = "SELECT * FROM location_item_relation WHERE location_id ='".$_POST['location']."'";
    echo $sql;
  $orders = mysqli_query($con, $sql );
    
}elseif(isset($_POST['job_order_query'])){
     $sql = "SELECT * FROM location_item_relation WHERE location_id ='".$_POST['job_order']."'";
    echo $sql;
}?>
        Items at Location/ Job Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Items</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Items</h3>
            </div>
            <!-- /.box-header -->
              
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                  
                    <th>Item Code</th>
                      <th>Item Name</th>
                        <th>Quantity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  	
                  foreach ($orders as $value) 
                  	{ ?>
	                  <tr>
	                 
	                    <td><?php echo $value['location_id']; ?></td>
	                     <td><?php echo $value['item_id']; ?></td>
                           <td><?php echo $value['quantity']; ?></td>
	                  </tr>
	              	<?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
           
            <!-- /.box-body -->
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
<?php include ("includes/footer.php"); ?>