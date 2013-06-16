
<?php require_once ("database.php"); ?>
<?php require_once ("database_object.php"); ?>

<?php
class Zone extends DatabaseObject {
    protected static $table_name = "zone";
    protected static $db_fields = array('id', 'name'); 

    public $id;
    public $name;
}

?>
