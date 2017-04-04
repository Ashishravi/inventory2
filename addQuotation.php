<?php include("includes/header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <link href="dist/css/jquery-ui.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
      <script src="dist/js/jquery-ui.min.js"></script>
      <script>
    
$(document).ready(function(){
	 $("#name").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readCustomerFromCache.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#name").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#name").css("background","#FFF");
             console.log("data");
		}
		});
	});
});

function selectCustomer(id,name) {
    console.log(name);
    $("#id").val(id);
    $("#suggesstion-box").hide();
    $("#name").val(name);  
}
</script>

      
      
      
    <section class="content-header">
      <h1>
        New Quotation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Quotation</li>
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
                  <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID">
                </div>
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                     
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
       
       <td><select id="type_1" name="type[]"><option value="Item">Item</option><option value="Bundle">Bundle</option></select></td>
       
    <td><input type="text" data-type="productName" name="item_description[]" id="item_description_1" class="autocomplete_txt" placeholder="Description" autocomplete="off"></td>
       
    <td><input type="number" step="any" name="unit_price[]" id="unit_price_1" autocomplete="off" placeholder="Unit Price" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
       
       <td><input type="number" step="any" name="qty[]" id="qty_1" autocomplete="off" placeholder="Quantity"  onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
       <td><select id="unit_days_1" name="unit_days[]" autocomplete="off"><option value="Days">Days</option><option value="Weeks">Weeks</option><option value="Months">Months</option></select></td>
       <td><input type="text" name="duration[]" id="duration_1" placeholder="Duration" autocomplete="off" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" step="any"></td>
        <td><input type="number"  step="any" name="total_price[]" id="total_price_1" placeholder="Total Price"  class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
   </tr>
          </tbody>
       
  </table>
                  
                  
                  <div>
                  <div style="float:right;display:block;" class="row">
                  <button class="btn btn-danger delete" type="button">- Delete</button>
      			<button class="btn btn-success addmore" type="button">+ Add More</button>
                  <!--  <input type="button" onclick="add_row();" value="ADD ROW">-->
  <!--<input type="submit" name="submit_row" value="SUBMIT">-->
                 </div>
                      </div>
                  
                  <hr>
                  
                  
           <div class="row">
               <div class="col-md-6">
               
                    </div>
                <div class="col-md-6" style="float:right;">
                <div class="form-group">
                    <div class="input-group">
                    <div class="input-group-addon">
                    Total
                  </div>
	          <input type="number" class="form-control" name="total" id="total">
                  </div>
                    
                    </div>
                  
                     <div class="form-group">
	            <div class="input-group">
                    <div class="input-group-addon">
                    Freight
                  </div>
	          <input type="number"  class="form-control" name="freight" id="freight">
                         </div></div>
                        
                   <div class="form-group">
                         <div class="input-group">
                    <div class="input-group-addon">
                    Sub Total
                  </div>
	          <input type="number"  class="form-control" name="sub_total" id="sub_total">
                       </div></div>
                  
                <div class="form-group">
	           <div class="input-group">
                    <div class="input-group-addon">
                    Tax
                  </div>
	          <input type="number" class="form-control" name="tax" id="tax">
                    </div></div>
                          
                  <div class="form-group">
	            <div class="input-group">
                    <div class="input-group-addon">
                    Swach Bharat
                  </div>
	          <input type="number"  class="form-control" name="swach_bharat" id="swach_bharat">
                  </div>
                    </div>
                          
                  <div class="form-group">
	            <div class="input-group">
                    <div class="input-group-addon">
                    KKC
                  </div>
	          <input type="number"  class="form-control" name="kkc" id="kkc">
                      </div></div>
                        <div class="form-group">
	            <div class="input-group">
                    <div class="input-group-addon">
                    Total
                  </div>
	          <input type="number"  class="form-control" name="grand_total" id="grand_total">
                            </div> </div>  
                    
               </div>
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