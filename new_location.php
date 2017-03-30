<?php include("includes/header.php"); ?>
<?php 
$result = mysqli_query($con, "SELECT * FROM table_location_category");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Location
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Location</li>
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
	     
                   <form class="form-horizontal" role="form" method="post" action="add_location.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="location_name">Location Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="location_name" name="location_name" placeholder="Location Name"/>
                    </div>
                  </div>
                     <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="location_id">Location ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="location_id" name="location_id" placeholder="Location ID"/>
                    </div>
                  </div>
                       
                        <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="location_category">Location Category</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="location_category" id="location_category" required>
                         <option value="" selected disabled>Please select</option>
                       <?php
		           		foreach ($result as $row) { ?>
                       <option value="<?php echo $row['location_category_id'] ?>"><?php echo $row['name'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                       
                        <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="location_address">Location Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="location_address" name="location_address" placeholder="Location Address"/>
                    </div>
                  </div>
                       
                        <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="name">Contact Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="name" name="name" placeholder="Contact Name"/>
                    </div>
                  </div>
                       
                        <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="mobile">Contact Mobile</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="mobile" name="mobile" placeholder="Contact Mobile"/>
                    </div>
                  </div>
                       
                        <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="email">Contact Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="email" name="email" placeholder="Contact Email"/>
                    </div>
                  </div>
                  
                <input type="submit" id="submit-form" name="new_bundle" />
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