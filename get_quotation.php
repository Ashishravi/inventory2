<?php
require 'includes/dbcon.php';
 error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_POST['get_quot'];

$quotation_items = "SELECT * FROM table_quotation WHERE s_no = $id";
$quotation_prices = "SELECT * FROM table_quot_price WHERE s_no = $id";
$order ="SELECT * FROM orders WHERE id = $id";

$items = mysqli_query($con, $quotation_items);

    $si = 0;
    $string = '';
    foreach ($items as $row) {
    $si++;
    $string.="<tr>
     <td>$si</td>
    <td>$row[desc]</td>
    <td>$row[unit_price]</td>
    <td>$row[qty]</td>
    <td>$row[duration] $row[units]</td>
    <td>$row[tot]</td>
    </tr>";
    }
$price = mysqli_query($con, $quotation_prices);

$price_arr = mysqli_fetch_array($price);

$order_result = mysqli_query($con, $order);

$order_arr = mysqli_fetch_array($order_result);

$qb_cache = "SELECT * FROM qb_cache_customer WHERE customer_id =".$order_arr['customer_id'];

$qb_result = mysqli_query($con, $qb_cache);

$qb_arr = mysqli_fetch_array($qb_result);

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='bootstrap/js/bootstrap.min.js'></script>
</head>
<body>
<div class='container'>
    <div class='jumbotron' align='center'><b><h2>Quotation</h2></b></div><hr>
    <div id='cutomerID' name='customerId' align='left'><b>Customer ID :</b>".$order_arr['customer_id']."</div>
    <div id='cutomerName' name='customerName' align='left'><b>Customer Name :</b>".$qb_arr['customer_name']."</div>
    <div class='row'>
         <div id='billing_location' class='col-sm-6' name='billing_location' align='left'><b>Billing Location :</b>".$order_arr['billing_add']."</div>
     <div id='delivery_location' class='col-sm-6' name='delivery_location' align='right'><b>Delivery Location :</b>".$order_arr['delivery_add']."</div>
            </div>
    
    <hr>
  <h2>Item Details</h2>          
  <table class='table table-striped'>
    <thead>
      <tr>
          <th>Type</th>
        <th>Item Description</th>
        <th>Item Quantity</th>
        <th>Unit Price</th>
          <th>Duration</th>
        <th>Total Price</th>
      </tr>
    </thead>
    <tbody>
   $string
         <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
          <td></td>
          <td>".$price_arr['total']."</td>
      </tr>
      
    </tbody>
  </table>
    <div class='col-md-12' align='right'>
     <div id='freight' name='freight' align='right'><b>Freight :</b>".$price_arr['freight']."</div>
     <div id='total' name='freight' align='right'><b>Total :</b>".$price_arr['sub_total']."</div>
     <div id='servicetax' name='freight' align='right'><b>Service Tax :</b>".$price_arr['tax']."</div>
     <div id='swachbharat' name='swachbharat' align='right'><b>Swachh Bharat :</b>".$price_arr['swach_bharat']."</div>
     <div id='fcs'  name='fcs' align='right'><b>FCS :</b>".$price_arr['kkc']."</div>
        <div id='gtotal' name='gtotal' align='right'><b>Grand Totoal :</b>".$price_arr['total']."</div>
    </div>
        
    
    
</div>
</body>
</html>";

?>