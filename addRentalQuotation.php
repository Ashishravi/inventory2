<?php include("includes/header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <link href="dist/css/jquery-ui.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
      <script src="dist/js/jquery-ui.min.js"></script>

      <script src="dist/js/rentalquot.js"></script>
      
    <section class="content-header">
      <h1>
        New Rental Quotation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Rental Quotation</li>
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
                <form role="form" method="post" action="set_quotation.php" enctype="multipart/form-data">
                   <div class="box-body">
                  <div class="row">
               <div class="col-md-6">
                                  <div class="form-group">
                  <label for="id">Customer ID</label>
                  <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID" autocomplete="off">
                </div>
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" autocomplete="off">
                     
                </div>
                                  <div id="suggesstion-box"></div>
                   
                   
                                 </div>
                  <div class="col-md-6">
                                 <div class="form-group">
                   <label for="delivery_address">Delivery Address</label>
                                    
                    <input type="text" class="form-control" name="delivery_address" id="delivery_address" placeholder="Delivery Address">   
                          
                </div>
                 
	      <div class="form-group">
                  <label for="name">Delivery Date</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="del_date" class="form-control pull-right" id="datepicker">
                </div>
                </div></div>
                                 </div>
                  <hr>
                  
                
                <div class='row'>
						      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						      			<table class="table table-bordered table-hover" id="table_auto">
											<thead>
												<tr>
													<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                                                    <th>Type</th>
													<th width="10%">Item No</th>
													<th>Description</th>
													<th width="10%">Unit Price</th>
													
                                                     <th width="10%">Duration</th>
                                                    <th width="10%">Units</th>
                                                   <th width="10%">Quantity</th>
													<th width="10%">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
                                                    
													<td><input class="case" type="checkbox"/></td>
                                                     <td><select id="type_1" name="item_type[]"><option value="Item">Item</option><option value="Bundle">Bundle</option></select></td>
													<td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
													<td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
													<td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
													 <td><input type="number" name="duration[]" id="duration_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                                                    <td><select id="unit_dur_1" name="unit_dur[]">
                                                        <option value="Days">Days</option>
                                                         <option value="Weeks">Weeks</option>
                                                        <option value="Months">Months</option>
                                                        <option value="Years">Years</option></select></td>
                                                   
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
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Freight: ₹
                                                    </div>
                                                    <input type="number" step="any" class="form-control" name="freight" id="freight" placeholder="Freight" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                        Sub Total: ₹
                                                     </div>
                                                     <input type="number" step="any" class="form-control" name="sub_total_freight" id="sub_total_freight" placeholder="SubTotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                                                 </div>
                                            </div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">Tax: ₹</div>
													<input type="number" step="any" class="form-control" id="tax" name="tax" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
                                             <div class="form-group">
                                                 <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Swach Bharat: ₹
                                                     </div>
                                                     <input type="number" step="any"  class="form-control" name="swach_bharat" id="swach_bharat" placeholder="Swach Bharat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                                                 </div>
                                            </div>
                                             <div class="form-group">
                                                 <div class="input-group">
                                                    <div class="input-group-addon">
                                                        KKC: ₹
                                                     </div>
                                                     <input type="number" step="any" class="form-control" name="kkc" id="kkc" placeholder="KKC" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                                                 </div>
                                            </div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">Total: ₹</div>
													<input type="number" step="any" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
									</div>
						      	</div>
						      	
	   
                 </div>
                      </div>
                  
                  <hr>   
	      </div>
	 <input  type="hidden" value="Rentls" name="quot_type">
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


<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script src="dist/js/jquery-ui.min.js"></script>
<script src="dist/js/rentalquot.js"></script>