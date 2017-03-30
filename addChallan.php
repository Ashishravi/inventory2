<?php include("includes/header.php"); ?>

<script type="text/javascript">
function add_row()
{
 $rowno=$("#challan_table tr").length;
 $rowno=$rowno+1;
 $("#challan_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='item_code[]' placeholder=ItemCode'></td><td><input type='text' name='item_description[]' placeholder='Description'></td><td><input type='text' name='item_quantity[]' placeholder='Quantity'></td><td><input type='text' name='app_price[]' placeholder='Approx Unit Price'></td><td><input type='text' name='total_price[]' placeholder='Total Price'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>

<?php 
$sql = mysqli_query($con, "SELECT * FROM orders WHERE id = '".$_GET['id']."'");
$result = mysqli_fetch_array($sql);
$item = explode(",",$result['items']);
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Challan to Order No <?php echo $result['job_order']; ?>
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
        <div>
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Order Number <?php echo $_GET['id']; ?>
	          </h3>
        	</div>
        <!-- /.col -->
            <div class="box-body">

             <div class="row">
                 <blockquote>
	          <strong>Billing Address:
	            </strong><?php echo $result['billing_add']; ?>
	          </blockquote>
                 <blockquote>
	          <strong>Delivery Address:
	            </strong><?php echo $result['delivery_add']; ?>
	          </blockquote>
               </div>
        	</div>

		    </div>
		  </div>
          <hr>
          
          <div id="form_div">
 <form method="post" action="add_challan_sql.php">
  <table id="challan_table" align=center>
   <tr id="row1">
    <td><input type="text" name="item_code[]" placeholder="Item Code"></td>
    <td><input type="text" name="item_description[]" placeholder="Description"></td>
    <td><input type="text" name="item_quantity[]" placeholder="Quantity"></td>
       <td><input type="text" name="app_price[]" placeholder="Approx Unit Price"></td>
        <td><input type="text" name="total_price[]" placeholder="Total Price"></td>
   </tr>
  </table>
  <input type="button" onclick="add_row();" value="ADD ROW">
  <input type="submit" name="submit_row" value="SUBMIT">
 </form>
</div>
          
		</div>
        

    </section>
      
         
    <!-- /.content -->

    <div class="clearfix"></div>
</div>

<?php include("includes/footer.php"); ?>