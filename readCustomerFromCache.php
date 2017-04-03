<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM qb_cache_customer WHERE customer_name like '" . $_POST["keyword"] . "%' ORDER BY customer_name LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="customer_list">
<?php
foreach($result as $item) {
?>
<li onClick="selectCustomer('<?php echo $item["customer_id"]; ?>', '<?php echo $item["customer_name"]; ?>' );"> <?php echo $item["customer_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>