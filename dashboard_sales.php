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
      <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Punch New Orders</span>
                 <a href="addorder.php" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
            </div>
            <!-- /.info-box-content -->
          </div>
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
                  <th>Status</th>
                  <th>Description</th>
                  <th>Job Order</th>
                  <th>Attachments</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = mysqli_query($con,"SELECT * FROM orders");
                while($result = mysqli_fetch_array($sql))
                {
                ?>
                <tr>
                       <td>
                           <?php if($result['status'] == 1) { ?>
                           <span class="label label-info">Planning</span>
                           <?php } elseif($result['status'] == -1) { ?>
                           <span class="label label-danger">Rejected</span>
                           <?php } elseif($result['status'] == 0) {?>
                            <span class="label label-default">FC Pending</span>
                           <?php } ?>
                    </td>  
                    
                    
                  <td><?php echo $result['description'] ?></td>
                     <td><?php echo $result['job_order'] ?></td>
                <td><a class="btn btn-block btn-default" href="vieworder.php?id=<?php echo $result['id']; ?>"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Description</th>
                  <th>Job Order</th>
                  <th>Attachments</th>
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
<?php include ("includes/footer.php"); ?>