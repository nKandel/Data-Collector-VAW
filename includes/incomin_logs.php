<?php
require_once ("database.php");
require_once ("database_object.php");


class IncomingLogs extends DatabaseObject {
    protected static $table_name = "incominglogs";
    protected static $db_fields = array('id', 'sender', 'uniqueKey', 'message', 'timeLog','isModerated'); 

    public $id;
    public $sender;
    public $uniqueKey;
    public $message;
    public $timeLog;
    public $isModerated;

    public  static function addLogs($sender, $uniqueKey, $message){
    	if(!empty($sender) && !empty($uniqueKey) && !empty($message)){
            $log = new IncomingLogs();
            $log->sender = $sender;
            $log->uniqueKey = $uniqueKey;
            $log->message = $message;
            $log->isModerated = 0;
            return $log;
        }else{
            return false;
        }
    }

    public function save($fromSparrow = false){
		date_default_timezone_set("Asia/Kathmandu");
		$this->timeLog = date('Y-m-d h:i:s a');
        $this->create();
    }
}

?>
