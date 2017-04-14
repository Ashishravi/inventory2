<?php
require_once 'includes/dbcon.php';
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT * FROM table_item where UPPER(name) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['item_code'].'|'.$row['name'].'|'.$row['value'];
		array_push($data, $name);
	}		
	echo json_encode($data);

	
}


