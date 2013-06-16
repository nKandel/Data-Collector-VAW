<?php require_once('database.php'); ?>
<?php require_once('database_object.php'); ?>
<?php require_once('moderatedLogs.php'); ?>


<?php
/*$result=mysql_query("SELECT * FROM subject",$connection);
confirm_query($result);
$array = mysql_fetch_row($result);
$data = array();
while($row=mysql_fetch_array($result)){
$json=array();
$json["name"]=$row["menu_name"];
$data[]=$json;
}*/
global $database;
$sql = 'Select count(Type) as tol_num, Type from moderatedlogs group by Type';
$result = $database->query($sql);
$count_data = array();
$type_data = array();
while($row=$database->fetch_array($result)){
	$count = array();
	$type = array();
	$count['index'] = $row['tol_num'];
	$type['name'] = $row['Type'];
	$type_data = $type;
	$count_data = $count;
}
echo json_encode($type_data);
echo json_encode($count_data);


?>
