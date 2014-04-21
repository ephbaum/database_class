<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Db.php';

$db = new Db();

$connectionStatus = ( $db->isConnected() ) ? 'Successful' : 'Unsuccessful';

?>