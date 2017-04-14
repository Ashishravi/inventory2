<?php include("includes/header.php"); ?>
<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
$location_from = $_POST['pickup_location'];
$location_to = $_POST['delivery_location'];
$job_order = $_POST['job_order'];
$challan_type = $_POST['challan_type'];

$items = mysqli_query($con, "SELECT * FROM location_item_relation WHERE location_id =".$location_from."" );
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Challan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Challan</li>
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
                 <form role="form" method="post" action="add_challan.php" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-info pull-right">Add Attachment</input>
	          <strong>Challan type:</strong> <?php echo $challan_type;?><br>
	          <strong>From Location:</strong> <?php echo $location_from;?><br>
	          <strong>To Location:</strong> <?php echo $location_to;?><br>
	          <strong>Job Order:</strong> <?php echo $job_order;?><br>
                        
                         <div id="form_div">
 
       
            
         
               
                   <div class="box-body">                  
                <div class='row'>
						      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						      			<table class="table table-bordered table-hover" id="table_challan_rental">
											<thead>
												<tr>
													<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                                                    <th width="10%">Type</th>
													<th width="10%">Item No</th>
													<th width="48%%">Description</th>
													<th width="10%">Unit Price</th>
                                                   <th width="10%">Quantity</th>
													<th width="10%">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
                                                    
													<td><input class="case" type="checkbox"/></td>
                                                     <td><select id="type_1" name="type[]"><option value="Item">Item</option><option value="Bundle">Bundle</option></select></td>
													<td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
													<td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
													<td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                                                    <td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
													<td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
												</tr>
											</tbody>
										</table>
						      		</div>
						      	</div>
						      	
						      	<div class='row'>
						      		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
						      			<button class="btn btn-danger delete" type="button">- Delete</button>
						      			<button class="btn btn-success addmore" type="button">+ Add More</button>
						      		</div>
						      		
										<div class="col-md-6" style="float:right;">
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon"> Total: ₹</div>
													<input type="number" step="any" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
                                 
									</div>
						      	</div>
						      	
	   
                 </div>
                      </div>
                  
                  <hr>   
	      </div>
	      <div class="box-footer">
	        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
	      </div>
            
            <input type="hidden" name="from" value="<?php echo $location_from; ?>"/>
            <input type="hidden" name="job_order" value="<?php echo $job_order; ?>"/>
            <input type="hidden" name="to" value="<?php echo $location_to; ?>"/>
            <input type="hidden" name="type" value="<?php echo $challan_type; ?>"/>

 </form>
</div>
                        
                
	    </div>
	   </div>
	  </div>
	 </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("includes/footer.php"); ?>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script src="dist/js/jquery-ui.min.js"></script>
<script src="dist/js/rental_challan.js"></script>