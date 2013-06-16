
<?php require_once ("database.php"); ?>
<?php require_once ("database_object.php"); ?>
<?php
class ModeratedLogs extends DatabaseObject {
    protected static $table_name = "moderatedlogs";
    protected static $db_fields = array('id', 'rawId', 'districtId', 'zoneId', 'Location','Type','Message'); 

    public $rawId;
    public $districtId;
    public $zoneId;
    public $Location;
    public $Type;
    public $Message;

    public  static function addLogs($rawId, $districtId, $zoneId, $Location, $Type, $Message){
            $log = new ModeratedLogs();
            $log->rawId = $rawId;
            $log->districtId = $districtId;
            $log->zoneId = $zoneId;
            $log->Location = $Location;
            $log->Type = $Type;
            $log->Message = $Message;
            return $log;
    }
}

?>
