<?php include("includes/header.php"); ?>
<?php 
$sql = mysqli_query($con, "SELECT * FROM orders WHERE id = '".$_GET['id']."'");
$result = mysqli_fetch_array($sql);
$location = mysqli_query($con, "SELECT * FROM table_location WHERE location_id = '".$result['delivery_add']."'");
$location_result = mysqli_fetch_array($location);
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Orders
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Orders</a></li>
        <li class="active">View</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- title row -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Order Number <?php echo $_GET['id']; ?>
	          </h3>
        	</div>
        <!-- /.col -->
            <div class="box-body">

                <blockquote>
	          <strong>Order No:
	            </strong><?php echo $result['job_order']; ?>
	          </blockquote>
                
                 <blockquote>
	          <strong>Remarks:
	            </strong><?php echo $result['description']; ?>
	          </blockquote>
                 <blockquote>
	          <strong>Mailing Address:
	            </strong><?php echo $location_result['address']; ?>
	          </blockquote>
                 <blockquote>
	          <strong>Billing Address:
	            </strong><?php echo $location_result['address']; ?>
	          </blockquote>
                 <blockquote>
	          <strong>Delivery Address:
	            </strong><?php echo $location_result['address']; ?>
	          </blockquote>
                 <blockquote>
	          <strong>Name:
	            </strong><?php echo $location_result['name']; ?>
	          </blockquote>
                 <blockquote>
	          <strong>Email:
	            </strong><?php echo $location_result['email']; ?>
	          </blockquote>
                <blockquote>
	          <strong>Phone:
	            </strong><?php echo $location_result['mobile']; ?>
	          </blockquote>
                <blockquote>
	          <strong>Delivery Date:
	            </strong><?php echo $result['date']; ?>
	          </blockquote>
                
        	</div>

		    </div>
		  </div>

        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Work Order Image
	          </h3>
        	</div>
        	<img src = "<?php echo $result['work_order_image']; ?>" style="width:94%; margin: 3%;" >

		    </div>
            <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Security Letter Image
	          </h3>
        	</div>
        	<img src = "<?php echo $result['security_letter_image']; ?>" style="width:94%; margin: 3%;" >

		    </div>
            <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Rental Payment Image
	          </h3>
        	</div>
        	<img src = "<?php echo $result['rental_payment_image']; ?>" style="width:94%; margin: 3%;" >

		    </div>
            <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Security Negotiable Image
	          </h3>
        	</div>
        	<img src = "<?php echo $result['security_neg_image']; ?>" style="width:94%; margin: 3%;" >

		    </div>
		  </div>
          <?php if ($_SESSION['name']=="finance"): ?>
		  <div class="col-md-6">
		  	<?php
		  	if($result['status'] == 0) {
		  	?>
		  	<a href = "finishedsuccess.php?id=<?php $_GET['id']; ?>"><button type="button" class="btn btn-block btn-success btn-lg">Approve Order</button></a>
		  	<?php } else { ?>
		  	<button type="button" class="btn btn-block btn-success btn-lg disabled">Action Already Taken</button>
		  	<?php } ?>
		  </div>
          <?php endif; ?>
		</div>
    <?php if ($_SESSION['name']=="finance_credit") : ?>
    <div><<h3>Approve Order?</h3></div>
    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#approveModal">Yes</button>
        <!-- Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog">
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
                
                <form class="form-horizontal" role="form" method="post" action="update.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="orderNo">Job Order No.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="orderNo" name="orderNo" placeholder="Order No."/>
                    </div>
                  </div>
                <input name="orderId" type="number" value="<?php echo $_GET['id'] ?>" class="hidden" />
                <input type="submit" name="financecrd_app" id="submit-form"  />
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
    <button type="button" class="btn btn-danger btn-lg btn-block " data-toggle="modal" data-target="#denyModal">No</button>
      <!-- Modal -->
<div class="modal fade" id="denyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="denyModalLabel">
                    Are you sure to cancel the order.
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" action="update.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="reason">Reason</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="reason" name="reason" placeholder="Reason"/>
                    </div>
                  </div>
                <input name="orderId2" type="number" value="<?php echo $_GET['id'] ?>" class="hidden" />
                <input type="submit" id="submit-form" name="financecrd_deny" />
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
    <?php endif; ?>
    </section>
    <!-- /.content -->

    <div class="clearfix"></div>
</div>

<?php include("includes/footer.php"); ?>