<?php include("includes/header.php"); ?>
<?php 
$sql = mysqli_query($con, "SELECT * FROM orders WHERE id = '".$_GET['id']."'");
$result = mysqli_fetch_array($sql);
$item = explode(",",$result['items']);
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Pickups
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
	            Order Number <?php echo $result['job_order']; ?>
	          </h3>
        	</div>
        <!-- /.col -->
            <div class="box-body">
                
                 <blockquote>
	          <strong>Description:
	            </strong><?php echo $result['description']; ?>
	          </blockquote>
                
                 <blockquote>
	          <strong>Type:
	            </strong><?php echo $result['type']; ?>
	          </blockquote>
                
	          <blockquote>
	          <strong>Address:
	            </strong><?php echo $result['address']; ?>
	          </blockquote>
	          
	          <blockquote>
	          <strong>Email:
	            </strong><?php echo $result['email']; ?>
	          </blockquote>
	          
	          <blockquote>
	          <strong>Phone:
	            </strong><?php echo $result['phone']; ?>
	          </blockquote>
                
                
	          
        	</div>
      <!-- Table row -->
		      <div class="row">
		        <div class="col-xs-12 table-responsive">
		          <table class="table table-striped">
		            <thead>
		            <tr>
		              <th>Product</th>
		              <th>Quantity</th>
		            </tr>
		            </thead>
		            <tbody>
		           	<?php
		           		foreach ($item as $value) {
		           			$break = explode('-', $value); ?>
		           			    <tr>
					              <td><?php echo $break[0]; ?></td>
					              <td><?php echo $break[1]; ?></td>
					            </tr>
		           		<?php }
		           	?>
		            </tbody>
		          </table>
		        </div>
		        <!-- /.col -->
		      </div>
		    </div>
		  </div>
 <?php if ($_SESSION['name']=="finance" || $_SESSION['name']=="orders"): ?>
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Image
	          </h3>
        	</div>
        	<img src = "<?php echo $result['image']; ?>" style="width:50%; margin: 3%;" >

		    </div>
		  </div>
           <?php endif; ?>
          
           <?php if ($_SESSION['name']=="ops"): ?>
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Create Challan
	          </h3>
        	</div>
              <form>
        	<p> 
  <input type="button" value="Add Row" onClick="addRow('dataTable')" /> 
  <input type="button" value="Remove Row" onClick="deleteRow('dataTable')" /> 
  <p>(All acions apply only to entries with check marked check boxes only.)</p>
</p>
				
<table id="dataTable" class="form" border="1">
 <tbody>
  <tr>
	<p>
	<td >
		<input type="checkbox" name="chk[]" checked="checked" />
	</td>
	<td>
	<label for="BX_NAME">From</label>
	<input type="text" name="BX_NAME[]">
	</td>
	<td>
	<label for="BX_item">Item</label>
	<input type="text" class="small"  name="BX_item[]">
	</td>
	<td>
		<label for="BX_quantity">Quantity</label>
	<input type="text" class="small"  name="BX_quantity[]">
	</td>
	<td>
	<label for="BX_price">Price</label>
	<input type="text" class="small"  name="BX_price[]">
	</td>
	</p>
  </tr>
 </tbody>
</table>         
             
</form>
		    </div>
		  </div>
           <?php endif; ?>
          
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

    </section>
    <!-- /.content -->

    <div class="clearfix"></div>
</div>
<script>
function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 5){							// limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}else{
		 alert("Maximum Passenger per ticket is 5.");
			   
	}
}

function deleteRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
		if(null != chkbox && true == chkbox.checked) {
			if(rowCount <= 1) { 						// limit the user from removing all the fields
				alert("Cannot Remove all the Passenger.");
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		}
	}
}
</script>
<?php include("includes/footer.php"); ?>