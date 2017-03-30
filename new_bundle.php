<?php include("includes/header.php"); ?>
<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
     $(document).on('focus','.item_code',function(){
        if (jQuery) {  
          // jQuery is loaded  
          alert("Yeah!");
        } else {
          // jQuery is not loaded
          alert("Doesn't Work");
        }
      });
    
function add_row()
{
 $rowno=$("#challan_table tr").length;
 $rowno=$rowno+1;
 $("#challan_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='item_code[]' placeholder='ItemCode'></td><td><input type='text' name='item_quantity[]' placeholder='Quantity'></td><td><button class='btn btn-danger' type='button' onclick=delete_row('row"+$rowno+"')>-Delete</button></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
    
    //autocomplete script
$(document).on('focus','.item_code',function(){
alert("hello");
});
    
    $( ".item_code" ).focus(function() {
  alert( "Handler for .focus() called." );
});

</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Bundle
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Bundle</li>
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
                         <div id="form_div">
 
        <form method="post" action="add_bundle.php">
            
               <div class="row">
             
                        <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="bundle_id">Bundle Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="bundle_id" name="bundle_id" placeholder="Bundle Id"/>
                    </div>
                  </div>
        
             
                        <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="bundle_name">Bundle Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="bundle_name" name="bundle_name" placeholder="Bundle Name"/>
                    </div>
                  </div>
        
        </div>
            
  <table id="challan_table" class="table table-striped">
        <thead>
		            <tr>
		              <th>Item</th>
		              <th>Quantity</th>
                        
		            </tr>
		            </thead>
      <tbody>
   <tr id="row1">
    <td><input type="text" name="item_code[]" id="item_code" placeholder="Item Code"></td>
    <td><input type="text" name="item_quantity[]" id="item_quantity" placeholder="Quantity"></td>
          </tbody>
  </table>
  <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
      			<button class="btn btn-success addmore" type="button" onclick="add_row();">+ Add More</button>
      <button type="submit" name="submit_row" class="btn btn-primary" >Submit</button>
      		</div>
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
<script>


</script>
<?php include("includes/footer.php"); ?>