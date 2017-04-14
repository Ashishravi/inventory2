<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
require_once 'includes/dbcon.php';
if(!empty($_POST['type'])){
	$type = $_POST['type'];
    $i_type = $_POST['i_type'];
	$name = $_POST['name_startsWith'];
    
    if($i_type == "Item")
    {
        $query = "SELECT * FROM table_item where UPPER(name) LIKE '".strtoupper($name)."%'";
    }else if($i_type == "Bundle")
    {
         $query = "SELECT * FROM table_bundle where UPPER(bundle_name) LIKE '".strtoupper($name)."%'";   
    }
	/*$query = "SELECT * FROM table_item where UPPER(name) LIKE '".strtoupper($name)."%'";*/
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		if($i_type == "Item")
        { $name = $row['item_code'].'|'.$row['name'].'|'.$row['value']; }
        else if($i_type == "Bundle")
        { $name = $row['bundle_id'].'|'.$row['bundle_name'].'|'.$row['value']; }   
		array_push($data, $name);
	}		
	echo json_encode($data);

	
}


