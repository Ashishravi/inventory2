<?php

$html="<!DOCTYPE html>
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
    <div class='jumbotron' align='center'><b><h2>Challan</h2></b></div><hr>
  <div id='pickup_location' name='pickup_location' align='center'><b>Pickup Location :</b>D-8, Gulmohar Park<br>New Delhi-110049<br></div>
    <hr>
    <div class='row'>
         <div id='billing_location' class='col-sm-6' name='billing_location' align='left'><b>Billing Location :</b>Youngman<br>Uttar Pradesh-445649</div>
     <div id='delivery_location' class='col-sm-6' name='delivery_location' align='right'><b>Delivery Location :</b>Youngman<br>Uttar Pradesh-445649</div>
            </div>
    
    <hr>
  <h2>Item Details</h2>          
  <table class='table table-striped'>
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Item Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ladder</td>
        <td>This is a description</td>
        <td>5</td>
        <td>256</td>
          <td>1024</td>
      </tr>
          <tr>
        <td>Scaffolds</td>
        <td>This is a description</td>
        <td>5</td>
        <td>256</td>
          <td>1024</td>
      </tr>
      
    </tbody>
  </table>
</div>
</body>
</html> ";

?>