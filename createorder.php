<?php include("includes/header.php"); ?>
<?php if($_GET['id']){
   $s_no = $_GET['id'];

$sql = "SELECT * FROM `table_quotation` WHERE s_no = $s_no";
$result_i  = mysqli_query($con, $sql);
$result = mysqli_fetch_array($result_i);
    
    $sql2 = "SELECT
            credit_limit, outstanding
            FROM qb_cache_customer
            WHERE customer_id = '".$result['customer_id']."'";
    
   
//    echo $sql2;
    
    $customer_details = mysqli_query($con, $sql2);
    $customer_details_array = mysqli_fetch_array($customer_details);
    
    
}else{
    echo "No id FOund";
}?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Order<br>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Order</li>
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
	      <form role="form" method="post" action="set_order.php" enctype="multipart/form-data">
              <div class="box-body">
                             <div class="row">
               <div class="col-md-6">
                                  <div class="form-group">
                  <label for="id">Customer ID</label>
                  <input type="text" class="form-control" name="id" id="id" value="<?php echo $result['customer_id']; ?>">
                </div>
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $result['customer_name']; ?>">
                </div>
                                   <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                </div>
                                 </div>
                  <div class="col-md-6">
                                 <div class="form-group">
                   <label for="delivery_address">Delivery Address</label>
                                    
                    <input type="text" class="form-control" name="delivery_address" id="delivery_address" value=" <?php echo $result['delivery_address'];?>">   
                          
                </div>
                   <input type="hidden" class="form-control" name="phone" id="phone" value="0">
                  <input type="hidden" class="form-control" name="email" id="email" value="example@email.com">
	      <div class="form-group">
                  <label for="name">Delivery Date</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="del_date" class="form-control pull-right" id="datepicker" value=" <?php echo $result['delivery_date'];?>">
                </div>
                </div></div>
                                 </div>
                  <hr>
                  
                 <input type="hidden" value="<?php echo $s_no; ?>" name="quot">
               
            <div class="row">
	        <div class="form-group col-md-3">
	          <label for="image1">Order Image</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
            <div class="form-group col-md-3">
	          <label for="image1">Security Letter Image</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
            <div class="form-group col-md-3">
	          <label for="image1">Rental Payment Image</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
            <div class="form-group col-md-3">
	          <label for="image1">Security Cheque</label>
	          <input type="file" name="fileToUpload[]" id="fileToUpload">
	          <p class="help-block">Insert the item picture here</p>
	        </div>
            </div>
                  <hr> 
                 
                  
	      </div>
	      <!-- /.box-body -->
	 <?php $sum = $customer_details_array['outstanding'] + $result['total'];
         if($sum > $customer_details_array['credit_limit']) {
             $create="0";
            $obj =  "UPDATE `table_quotation` SET `objection`=1 WHERE s_no = $s_no";
             mysqli_query($con, $obj);
             echo $create;
            }else  {$create="1";
                    $obj =  "UPDATE `table_quotation` SET `objection`=0 WHERE s_no = $s_no";
             mysqli_query($con, $obj);  echo $create;}
          ?>
	      <div class="box-footer">
	        <button type="submit" name="submit" id="submit" class="btn btn-primary" >
                Submit</button>
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