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
        <div class=" nav-tabs-custom">
   <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Orders</a></li>
    <li><a data-toggle="tab" href="#menu2">Quotations</a></li>
  </ul>
        
<div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <h3>Orders</h3>
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
    </div>
    <div id="menu2" class="tab-pane fade">
            <h3>Quotationss</h3>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Quotations</h3>
            </div>
            <!-- /.box-header -->
      
           
                
                 <div class="box-body">
              <table id="godown" class="table table-bordered table-hover">
                <thead>
               <tr>
                  <th>Status</th>
                  <th>Customer Name</th>
                  <th>Edit</th>
                    <th>Create Order</th>
                   <th>View</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $quotation = mysqli_query($con,"SELECT * FROM table_quotation");
                while($q_result = mysqli_fetch_array($quotation))
                {
                ?>
                <tr>
                       <td><?php echo $q_result['status'] ?></td>
                     <td><?php echo $q_result['customer_name'] ?></td>
                    <td><a class="btn btn-block btn-default" href="editquotation.php?id=<?php echo $q_result['s_no']; ?>"><i class="fa fa-edit"></i> Edit</a></td>
                <td><a class="btn btn-block btn-default" href="createorder.php?id=<?php echo $q_result['s_no']; ?>"><i class="fa fa-eye"></i> Create</a></td>
                    <td><a class="btn btn-block btn-default" href="viewquotation.php?id=<?php echo $q_result['s_no']; ?>"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Customer Name</th>
                  <th>Edit</th>
                    <th>Create Order</th>
                     <th>View</th>
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
    </div>
            
            
        </div>
            
        </div>
      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include ("includes/footer.php"); ?>