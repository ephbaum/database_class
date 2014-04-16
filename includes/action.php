<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/db_class/classes/Db.php';

$db = new Db();

$connectionStatus = ( $db->isConnected() ) ? 'Successful' : 'Unsuccessful';

?>