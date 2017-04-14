<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YoungMan | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
    
<?php

//$job_order = $_POST['id'];
    
    include("includes/dbcon.php");
            $challan_id = $_GET['id'];
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

$sql = "SELECT * FROM `challan_item_relation` WHERE challan_id = '$challan_id'";


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
    
<body  onload="window.print();">
<div class="wrapper">
      <!-- Main content -->
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
          <a href="printquotation.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         <!-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>-->
        </div>
      </div>
    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
