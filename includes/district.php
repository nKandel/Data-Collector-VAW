
<?php require_once ("database.php"); ?>
<?php require_once ("database_object.php"); ?>

<?php
class District extends DatabaseObject {
    protected static $table_name = "district";
    protected static $db_fields = array('id', 'zoneId','name'); 

    public $id;
    public $zoneId;
    public $name;
}

?>
