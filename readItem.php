<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM table_item WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $item) {
?>
<li onClick="selectItem('<?php echo $item["item_code"]; ?>', '<?php echo $item["name"]; ?>', '<?php echo $item["selling_value"];?>' );"> <?php echo $item["name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>