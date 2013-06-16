<?php
 require_once('includes/initialize.php');

 $sender = $_GET['from'];
 $uniqueKey = $_GET['keyword'];
 $message = $_GET['text'];
 
 $sender = substr($sender,-10);

 $log = IncomingLogs::addLogs($sender, $uniqueKey, $message);
 $log->save(true);

 //die($reply);

?>