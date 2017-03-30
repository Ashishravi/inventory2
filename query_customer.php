<?php

 error_reporting(E_ALL);
  ini_set('display_errors', 1);
require_once '../config.php';

require_once '../views/header.tpl.php';



?>

<pre>

<?php

$CustomerService = new QuickBooks_IPP_Service_Customer();

$customers = $CustomerService->query($Context, $realm, "SELECT * FROM Customer  WHERE Id = '4' ");

foreach ($customers as $Customer)
{

	$billaddr = $Customer->getBillAddr();

$billing_addr = '';
$billing_addr .= $billaddr->getLine1() . "\n<br>";
$billing_addr .= $billaddr->getLine2() . "\n<br>";
$billing_addr .= $billaddr->getLine3() . "\n<br>";
$billing_addr .= $billaddr->getCity() . ',  ' . $billaddr->getCountrySubDivisionCode() . ' ' . $billaddr->getPostalCode() . "\n<br>";
$billing_addr .= $billaddr->getCountry();

	$shipaddr = $Customer->getShipAddr();

$shipping_addr = '';
$shipping_addr .= $shipaddr->getLine1() . "\n<br>";
$shipping_addr .= $shipaddr->getLine2() . "\n<br>";
$shipping_addr .= $shipaddr->getLine3() . "\n<br>";
$shipping_addr .= $shipaddr->getCity() . ',  ' . $shipaddr->getCountrySubDivisionCode() . ' ' . $shipaddr->getPostalCode() . "\n<br>";
$shipping_addr .= $shipaddr->getCountry();

//print_r($Customer);
	print('Customer Id=' . $Customer->getId() . ' is named: ' . $Customer->getFullyQualifiedName() .'Billing Address is '.$billing_addr.'Shipping Address is '.$shipping_addr. '<br>');
}

/*
print("\n\n\n\n");
print('Request [' . $CustomerService->lastRequest() . ']');
print("\n\n\n\n");
print('Response [' . $CustomerService->lastResponse() . ']');
print("\n\n\n\n");
print('Error [' . $CustomerService->lastError() . ']');
print("\n\n\n\n");
*/	

?>

</pre>

<?php

require_once '../views/footer.tpl.php';

?>