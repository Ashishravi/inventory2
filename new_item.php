<?php include("includes/header.php"); ?>
<?php 
$result = mysqli_query($con, "SELECT * FROM table_item_category");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Item</li>
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
	     
                   <form class="form-horizontal" role="form" method="post" action="add_item.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="item_desc">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="item_desc" name="item_desc" placeholder="Description"/>
                    </div>
                  </div>
                     <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="item_code">Item Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="item_code" name="item_code" placeholder="Item Code"/>
                    </div>
                  </div>
                       <div class="form-group">
                   <label  class="col-sm-2 control-label"
                              for="item_category">Item Category</label>
                            <div class="col-sm-10">
                   <select class="custom-select form-control" name="item_category" id="item_category" required>
                         <option value="" selected disabled>Please select</option>
                       <?php
		           		foreach ($result as $row) { ?>
                       <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                       <?php }	?>
                       
                    </select>
                           </div>
                </div>
                     <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="length">Length</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="length" name="length" placeholder="Length"/>
                    </div>
                  </div>
                     <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="breadth">Breadth</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="breadth" name="breadth" placeholder="Breadth"/>
                    </div>
                  </div>
                    <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="height">Height</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="height" name="height" placeholder="Height"/>
                    </div>
                  </div>
                     <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="weight">Weight</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="weight" name="weight" placeholder="Weight"/>
                    </div>
                  </div>
                          <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="hsn">HSN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="hsn" name="hsn" placeholder="Material"/>
                    </div>
                  </div>
                          <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="purchase_value">Value</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="value" name="value" placeholder="Value"/>
                    </div>
                  </div>
                          <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="selling_value">Selling value</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="selling_value" name="selling_value" placeholder="Selling value"/>
                    </div>
                  </div>
                <input type="submit" id="submit-form" name="financecrd_deny" />
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