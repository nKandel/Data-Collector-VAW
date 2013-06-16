<?php require_once('../../includes/incomin_logs.php'); ?>
<?php require_once('../../includes/moderatedLogs.php'); ?>
<?php require_once('../../includes/zone.php'); ?>
<?php require_once('../../includes/district.php'); ?>
<?php require_once('../../includes/violenceType.php'); ?>
<?php require_once('../../includes/functions.php'); ?>

<?php 
	if(isset($_POST['moderate']))
	{


		$district = $_POST['district'];
		$zone = $_POST['zone'];
		$location = $_POST['location'];
		$type = $_POST['vtype'];
		$msg = $_POST['msg'];
		$rawId = $_GET['id'];

		$log = ModeratedLogs::addLogs($rawId, $district, $zone, $location, $type, $msg);
		$log->create();

		$log1 = IncomingLogs::find_by_id($rawId);
		$log1->isModerated = 1;
		$log1->update();
		redirect_to('index.php?sucess=true');

	}



?>