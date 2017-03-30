<?php
require_once 'includes/dbcon.php';
$atrr="";
if(!empty($_POST['i_type'])){
	$table = $_POST['i_type'];
	$name = $_POST['name_startsWith'];
    if($table == "table_item"){$atrr = "name"}
    else if ($table == "table_bundle"){$atrr = "bundle_name"}
	
    $query = "SELECT $attr FROM $table where $atrr LIKE '%$name%'";
    
      
   /* $sql2 = "SELECT app_id FROM form ORDER BY app_id DESC LIMIT 1 ";
    
    $q = $dbh->query($sql2);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $var = $q->fetch();
    $ht = $var['hospType'];
    
    $ht=='nonnabh' ? $htype='non_nabh_nabl' : $htype='nabh_nabl';*/
    
    
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['name'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}

?>

