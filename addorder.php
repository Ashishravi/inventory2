<?php include("includes/header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
	      <form role="form" method="post" action="upload.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="description">Remarks</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                </div>                
               
                   <div class="form-group">
                   <label for="mailing_address">Mailing Address</label>                         
                   <select class="custom-select form-control" name="mailing_address" id="mailing_address">
                         <option value="" selected disabled>Please select</option>
                       <?php
                       $location = mysqli_query($con, "SELECT location_id, location_name FROM table_location");
		           		foreach ($location as $row) { ?>
                       <option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
                       <?php }	?>
                       
                    </select>
                          
                </div>
                    <div class="form-group">
                   <label for="billing_address">Billing Address</label>
                         
                   <select class="custom-select form-control" name="billing_address" id="billing_address">
                         <option value="" selected disabled>Please select</option>
                       <?php
                       $location = mysqli_query($con, "SELECT location_id, location_name FROM table_location");
		           		foreach ($location as $row) { ?>
                       <option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
                       <?php }	?>
                       
                    </select>
                          
                </div>
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                </div>
             <div class="form-group">
                   <label for="delivery_address">Delivery Address</label>
                         
                   <select class="custom-select form-control" name="delivery_address" id="delivery_address">
                         <option value="" selected disabled>Please select</option>
                       <?php
                       $location = mysqli_query($con, "SELECT location_id, location_name FROM table_location");
		           		foreach ($location as $row) { ?>
                       <option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
                       <?php }	?>
                       
                    </select>
                          
                </div>
                  
            <!--    <div class="form-group">
                  <label for="address">Delivery Address</label>
                  <textarea class="form-control" rows="3" name="delivery_address" id="delivery_address" placeholder="Enter Address"></textarea>
                </div>-->
              <!--  <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                </div>
                
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>-->
                   <input type="hidden" class="form-control" name="phone" id="phone" value="0">
                  <input type="hidden" class="form-control" name="email" id="email" value="example@email.com">
	      <div class="form-group">
                  <label for="name">Delivery Date</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="del_date" class="form-control pull-right" id="datepicker">
                </div>
                </div>
	        <div class="form-group">
	          <label for="image1">Order Image</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
            <div class="form-group">
	          <label for="image1">Security Letter Image</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
            <div class="form-group">
	          <label for="image1">Rental Payment Image</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
            <div class="form-group">
	          <label for="image1">Security Cheque</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
	      </div>
	      <!-- /.box-body -->
	
	      <div class="box-footer">
	        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	    </div>
	   </div>
	  </div>
	 </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("includes/footer.php"); ?>