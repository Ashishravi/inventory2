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
                    <input type="button" onclick="add_row();" value="ADD ROW">
  <input type="submit" name="submit_row" value="SUBMIT">