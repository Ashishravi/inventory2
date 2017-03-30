<?php
session_start();

ob_start();
include("includes/dbcon.php");
$user_id=$_POST['user_id']; 
$pass=$_POST['pass']; 

$sql="SELECT * FROM user WHERE username='$user_id' AND password='$pass'";
$result=mysqli_query($con, $sql);
$count=mysqli_num_rows($result);

// If result matched $email and $pass, table row must be 1 row
if($count==1){
    $_SESSION['user_id']=$user_id;
    if($user_id=="orders@gmail.com"){
     $_SESSION['name']="orders";
         header("Location: dashboard_sales.php");
    }elseif($user_id=="finance_credit@gmail.com"){
     $_SESSION['name']="finance_credit";
         header("Location: dashboard_finance_crd.php");
    }elseif($user_id=="finance_account@gmail.com"){
     $_SESSION['name']="finance_account";
         header("Location: dashboard_finance_acc.php");
    }elseif($user_id=="planning@gmail.com"){
     $_SESSION['name']="ops";
         header("Location: dashboard_planning.php");
    }elseif($user_id=="dispatch@gmail.com"){
     $_SESSION['name']="dispatch";
         header("Location: dashboard_dispatch.php");
    }
   
   
}
else {
 header("Location: index.php?msg=error");
}
ob_end_flush();
?>