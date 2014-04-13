<?php

require_once( 'classes/Db.php' );

$db = new Db();

$connectionStatus = ( $db->isConnected() ) ? 'Successful' : 'Unsuccessful';

return;

function getRandomString( $length ) {

  /* build character set to use */
  $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

  /* create empty string */
  $randomString = "";

  /* count the number of chars in the charset string so we know how many choices we have */
  $charsetCount = strlen( $charset );

  /* looop over the $length until string length = $length */
  for ( $i = 0; $i < $length; $i++ ) {
    /* pick a random number from 1 up to the number of valid characters */
    $randomCharPick = mt_rand( 1, $charsetCount );

    /* grab a random character  from $charset ( index starts at 0) */
    $randomChar = $charset[$randomCharPick - 1];

    /* stick the $random_char to the end of the $random_string */
    $randomString .= $randomChar;
  }

/* stuff did, spit it back out. */
return $randomString;

}

  /** number of inserts between 1 and 10 **/
  $insertCount = mt_rand( 1, 10 );

  /** build insertion array **/
  $insertData = array();
  $randomStringLength = mt_rand( 6, 12 );
  for ( $j = 1; $j < $insertCount; $j++ ) {
    array_push( $insertData, getRandomString( $randomStringLength ) );
  }

  /** do some inserting... dirty **/
  foreach( $insertData as $insert ) {
  $insertSql = 'INSERT INTO noise(data) VALUES("'.$insert.'")';
    $db->query( $insertSql );
  }

  /* time to create a new array... for reasons. */
  $data = array();
  
  $retrieveSql = "SELECT * FROM noise";
  $dataBack = $db->query( $retrieveSql );
  
  /* and then we loop over the data we're going to get back from the database. */
  foreach( $dataBack as $row) {
  /* take that stuff and dump it into the array we created. */
    array_push( $data, $row['data'] );
  }
  
  $db->CloseConnection();

?>