<?php
   
require 'includes/dbcon.php';
 error_reporting(E_ALL);
ini_set('display_errors', 1);
                
require 'demo.php';
require_once 'plugins/dompdf/autoload.inc.php';




            $order = $_GET['id'];
            $challan_id = $_POST['challan_id'];

$pickup_location_id = '';
$delivery_location_id = '';

$pickup_address = '';
$delivery_address = '';

$query_loc_id = "SELECT * from table_challan WHERE challan_id = $challan_id";
$loc_ids = mysqli_query($con, $query_loc_id);
                  	while($locations=mysqli_fetch_array($loc_ids)){
                        
                        $pickup_location_id = $locations['pickup_loc_id'];
                        $delivery_location_id = $locations['delivery_loc_id']  ;  
                            
                      //  echo  $pickup_location_id." and ".$delivery_location_id."<br>";
                    }

$query_pickup_loc = "SELECT * from table_location WHERE location_id = $pickup_location_id";

$pickup_location = mysqli_query($con, $query_pickup_loc);
    while($pick=mysqli_fetch_array($pickup_location)){
                     //   echo $pick['address']." and ".$pick['state'];
                        $pickup_address = $pick['address'].'<br>'.$pick['state']."<br>".$pick['pincode'];
                    }

$query_delivery_loc = "SELECT * from table_location WHERE location_id = $delivery_location_id";

$delivery_location = mysqli_query($con, $query_delivery_loc);
    while($deli=mysqli_fetch_array($delivery_location)){
                     //   echo $deli['address']." and ".$deli['state'];
        $delivery_address = $deli['address'].'<br>'.$deli['state']."<br>".$deli['pincode'];
                    }

echo $pickup_address." ".$delivery_address;

$sql = "SELECT * FROM challan_item_relation WHERE challan_id = $challan_id ";


$items = mysqli_query($con, $sql);
    $si = 0;
    $string = '';
    foreach ($items as $row) {
    $si++;
    $string.="<tr>
     <td>$si</td>
    <td>$row[item_id]</td>
    <td>$row[quantity]</td>
    <td>$row[total_price]</td>
    </tr>";
    }
echo $string;


echo "<table>
     <tr>
    <th>S No</th>
    <th>Item Id</th> 
    <th>Quantity</th>
    <th>Total Price</th>
  </tr>
   
$string
     </table>";


use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

/*$customerID = "SELECT customer_id FROM orders WHERE job_order = '$order'";
$cid = '';

$cust_id = mysqli_query($con, $customerID);
foreach ($cust_id as $row) {
   $cid = $row['customer_id'];
    }

echo "CID".$cid;*/
    
//getBillingAddress($cid);
    



function getBillingAddress($customer_id){
    
    require_once '../config.php'; 

    require_once '../views/header.tpl.php'; 
    
    $CustomerService = new QuickBooks_IPP_Service_Customer();
    
    $customers = $CustomerService->query($Context, $realm, "SELECT * FROM Customer WHERE Id = '$customer_id'"); 

foreach ($customers as $Customer) 
{ 
    
    $billaddr = $Customer->getBillAddr();

$billing_addr = '';
$billing_addr .= $billaddr->getLine1() . "\n<br>";
$billing_addr .= $billaddr->getLine2() . "\n<br>";
$billing_addr .= $billaddr->getLine3() . "\n<br>";
$billing_addr .= $billaddr->getCity() . ',  ' . $billaddr->getCountrySubDivisionCode() . ' ' . $billaddr->getPostalCode() . "\n<br>";
$billing_addr .= $billaddr->getCountry();
    
    
    print('Customer Id=' . $Customer->getId() . ' is named: ' . $Customer->getFullyQualifiedName() .'Billing Address is '.$billing_addr.'<br>'); 
}  
}


?>
