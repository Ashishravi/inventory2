<?php include("includes/header.php"); ?>

<?php

$job_order = $_POST['id'];
$challan_id = $_POST['challan_id'];
$challan_type = '';

$pickup_location_id = '';
$delivery_location_id = '';

$pickup_address = '';
$delivery_address = '';

$query_loc_id = "SELECT * from table_challan WHERE challan_id = '$challan_id'";

$loc_ids = mysqli_query($con, $query_loc_id);
                  	while($locations=mysqli_fetch_array($loc_ids)){
                        
                        $pickup_location_id = $locations['pickup_loc_id'];
                        $delivery_location_id = $locations['delivery_loc_id']  ;  
                            $challan_type =  $locations['type'];
                    }


$query_pickup_loc = "SELECT * from table_location WHERE location_id=$pickup_location_id";

$pickup_location = mysqli_query($con, $query_pickup_loc);
    while($pick=mysqli_fetch_array($pickup_location)){
                        $pickup_address = $pick['address'].'<br>'.$pick['state']."<br>".$pick['pincode'];
                    }

$query_delivery_loc = "SELECT * from table_location WHERE location_id = $delivery_location_id";

$delivery_location = mysqli_query($con, $query_delivery_loc);
    while($deli=mysqli_fetch_array($delivery_location)){
                     //   echo $deli['address']." and ".$deli['state'];
        $delivery_address = $deli['address'].'<br>'.$deli['state']."<br>".$deli['pincode'];
                    }

$sql = "SELECT * FROM `challan_item_relation` WHERE challan_id = ' $challan_id'";


$items = mysqli_query($con, $sql);
    $si = 0;
    $string = '';
    foreach ($items as $row) {
    $si++;
    $string.="<tr>
     <td>$si</td>
    <td>$row[item_id]</td>
    <td>$row[item_description]</td>
   <td>$row[quantity]</td>
   <td>$row[unit_price]</td>
   <td>$row[total_price]</td>
    </tr>";
    }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quotation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Quotation</a></li>
        <li class="active">View Quotation</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Youngman India Pvt. Ltd.
             <medium class="pull-right"><?php echo $challan_type; ?></medium>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
        <hr>
        
        <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          
         <strong> Pickup Location</strong>
          <address>
             <?php echo $pickup_address;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <strong>  Delivery Address</strong>
          <address>
            <?php echo $delivery_address;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <strong>  Billing Address</strong>
          <address>
            <?php echo "Billing Address Here";?>
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                <th>S. No.</th>
                <th>Item Id</th>
                <th>Description</th>
             
              <th>Unit Price</th>
                 <th>Qty</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
                <?php echo $string; ?>
              <tr>
                <th>Total</th>
                <th></th>
                <th></th>
              <th></th>
              <th></th>
                <th>₹<?php echo $result['total'];?></th>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="print_challan.php?id=<?php echo $_POST['challan_id']; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
       <!--   <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>-->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
 <?php include("includes/footer.php"); ?>