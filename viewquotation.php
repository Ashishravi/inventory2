<?php include("includes/header.php"); ?>

<?php
$s_no = $_GET['id'];

$sql = "SELECT * FROM `table_quotation` WHERE s_no = $s_no";
$result_i  = mysqli_query($con, $sql);
$result = mysqli_fetch_array($result_i);

$quotation_items = "SELECT * FROM `table_quotation_item` WHERE s_no = $s_no";

  
    $cust = "SELECT * FROM `qb_cache_customer` WHERE customer_id = '".$result['customer_id']."'";
$cust_i  = mysqli_query($con, $cust);
$customer = mysqli_fetch_array($cust_i);


$items = mysqli_query($con, $quotation_items);

    $si = 0;
    $string = '';
    foreach ($items as $row) {
    $si++;
    $string.="<tr>
     <td>$si</td>
      <td>$row[type]</td>
    <td>$row[desc]</td>
    <td>$row[unit_price]</td>
    <td>$row[qty]</td>
    <td>$row[duration] $row[units]</td>
    <td>$row[tot]</td>
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
             <medium class="pull-right">Rental Quotation</medium>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
         <div >
          <strong>Customer ID:</strong><?php echo $result['customer_id']; ?><br>
            <strong>Customer Name:</strong><?php echo $result['customer_name']; ?>
            
        </div>
        <hr>
        
        <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          
         <strong> Kind Attention</strong>
          <address>
             <?php echo $customer['mailing_address'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <strong>  Delivery Address</strong>
          <address>
            <?php echo $result['delivery_address'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <strong>  Billing Address</strong>
          <address>
            <?php echo $customer['billing_address'];?>
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
                <th>Type</th>
                <th>Description</th>
             
              <th>Unit Price</th>
                 <th>Qty</th>
              <th>Duration</th>
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
              <th></th>
                <th>₹<?php echo $result['total'];?></th>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <b>Terms and Conditions</b>
            All copyright, trade marks, design rights, patents and other intellectual property rights (registered and unregistered) in and on BBC Online Services and BBC Content belong to the BBC and/or third parties (which may include you or other users.) The BBC reserves all of its rights in BBC Content and BBC Online Services. Nothing in the Terms grants you a right or license to use any trade mark, design right or copyright owned or controlled by the BBC or any other third party except as expressly provided in the Terms.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <!--<p class="lead">Amount Due 2/22/2014</p>-->

          <div class="table-responsive">
            <table class="table">
                <tr>
                <th style="width:50%">Freight:</th>
                <td>₹<?php echo $result['freight'];?></td>
              </tr>
              <tr>
                <th>Subtotal:</th>
                <td>₹<?php echo $result['sub_total'];?></td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>₹<?php echo $result['tax'];?></td>
              </tr>
              <tr>
                <th>Swachh Bharat:</th>
                <td>₹<?php echo $result['swach_bharat'];?></td>
              </tr>
                 <tr>
                <th>KKC:</th>
                <td>₹<?php echo $result['kkc'];?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>₹<?php echo $result['total'];?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="printquotation.php?id=<?php echo $result['s_no']; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <!--<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
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