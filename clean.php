<?php

require_once( 'classes/Db.php' );

$db = new Db();

if ( $db->isConnected() ) {
  echo "<p>Successfuly connected....</p>"; 
}
  
  /** DELETE FROM table_name without arguments deletes EVERYTHING **/
  $sql = 'DELETE FROM noise';
  $db->query($sql);
  echo "<em>Delete successful, probably.<em>";

  /* kill the database connection */
  $db->CloseConnection();
?>