
<?php require_once ("database.php"); ?>
<?php require_once ("database_object.php"); ?>
<?php
class ViolenceType extends DatabaseObject {
    protected static $table_name = "violencetype";
    protected static $db_fields = array('id', 'type'); 

    public $id;
    public $type;
}

?>