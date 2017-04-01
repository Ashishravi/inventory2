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
	      <form role="form" method="post" action="set_quotation.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="description">Remarks</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                </div>                
               
                   <div class="form-group">
                   <label for="mailing_address">Mailing Address</label>                         
                  <input type="text" class="form-control" name="mailing_address" id="mailing_address" placeholder="mailing_address">                         
                </div>
                    <div class="form-group">
                   <label for="billing_address">Billing Address</label>
                         <input type="text" class="form-control" name="billing_address" id="billing_address" placeholder="billing address">           
                </div>
                  <div class="form-group">
                   <label for="delivery_address">Delivery Address</label>
                                    
                    <input type="text" class="form-control" name="delivery_address" id="delivery_address" placeholder="delivery_address">   
                          
                </div>
                  
                  <div class="form-group">
                  <label for="id">Customer ID</label>
                  <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID">
                </div>
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
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
               
   <table id="challan_table" class="table table-striped">
        <thead>
		            <tr>
                    <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
		              <th>Item</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Units</th>
                        <th>Duration</th>
                        <th>Total Price</th>
		            </tr>
		            </thead>
      <tbody>
   <tr>
       <td><input class="case" type="checkbox"/></td>
       <td><select id="type" name="type[]"><option value="Item">Item</option><option value="Bundle">Bundle</option></select></td>
    <td><input type="text" name="item_description[]" id="item_description_1" class="autocomplete_txt" placeholder="Description"></td>
    <td><input type="text" name="unit_price[]" id="unit_price" placeholder="Unit Price"></td>
       <td><input type="text" name="qty[]" id="qty" placeholder="Quantity"></td>
       <td><select id="unit_days" name="unit_days[]"><option value="Days">Days</option><option value="Weeks">Weeks</option><option value="Months">Months</option></select></td>
       <td><input type="text" name="duration[]" id="duration" placeholder="Duration"></td>
        <td><input type="number" name="total_price[]" placeholder="Total Price"></td>
   </tr>
          </tbody>
       
  </table>
                  <button class="btn btn-danger delete" type="button">- Delete</button>
      			<button class="btn btn-success addmore" type="button">+ Add More</button>
                  <!--  <input type="button" onclick="add_row();" value="ADD ROW">-->
  <input type="submit" name="submit_row" value="SUBMIT">
                  
                  
                  <div class="form-group">
	          <label for="total">total</label>
	          <input type="number" name="total" id="total">
                  </div>
                  
                     <div class="form-group">
	          <label for="freight">Freight</label>
	          <input type="number" name="freight" id="freight">
                  </div>
                        
                   <div class="form-group">
	          <label for="sub_total">Sub Total</label>
	          <input type="number" name="sub_total" id="sub_total">
                  </div>
                  
                <div class="form-group">
	          <label for="tax">Service Tax</label>
	          <input type="number" name="tax" id="tax">
                  </div>
                          
                  <div class="form-group">
	          <label for="swach_bharat">Swach Bharat</label>
	          <input type="number" name="swach_bharat" id="swach_bharat">
                  </div>
                          
                  <div class="form-group">
	          <label for="kkc">KKC</label>
	          <input type="number" name="kkc" id="kkc">
                  </div>
                  <div class="form-group">
	          <label for="grand_total">Total</label>
	          <input type="number" name="grand_total" id="grand_total">
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