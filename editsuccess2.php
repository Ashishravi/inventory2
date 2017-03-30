<?php
session_start();
include("includes/dbcon.php");
if (isset($_POST['submit']))
{
    $sql="UPDATE godown_inventory SET itemcord = '".$_GET['itemcord']."', type = '".$_POST['type']."', quantity = '".$_POST['qty']."', quantity = quantity + '".$_POST['addqty']."' WHERE itemcord = '".$_GET['itemcord']."'";
    //$a=1;
    mysqli_query($con, $sql);
header('Location: godown.php');
}
?>