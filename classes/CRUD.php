<?php

  require_once 'Db.php';

  /**
   * CRUD class
   *
   * @author F. Stephen Kirschbaum (@fskirschbaum)
   **/

  class CRUD
  {
    /**
     * search function
     *
     * here's where we search for stuff
     * this may not be necessary... I could so something else with this.
     *
     * @return object
     * @author F. Stephen Kirschbaum (@fskirschbaum)
     **/
    public function search( $value )
    {
      $db = new Db();
      $sql = "SELECT * FROM noise WHERE data = '$value'";
      $response = $db->query( $sql );
      return $response;
      $db->CloseConnection();
      $db = null;
    }

    /**
     * create function
     * we want to insert something into a table on the database
     * we need to check if that thing already exists, if it does, fail
     *
     * @return array
     * @author F. Stephen Kirschbaum (@fskirschbaum)
     **/

    public function create( $value )
    {
      $db = new Db();
      $sql = "INSERT INTO noise (data) VALUES ('$value')";
      $result = $db->query( $sql );
      $lastInsertId = $this->getLastInsertId($db);
      $response = array('data' => $result, 'lastId' => $lastInsertId);
      return $response;
      $db->CloseConnection();
      $db = null;
    }

    /**
     * get last insert id function
     * we want to get the auto incremented id of the last inserted record
     *
     * @return int
     * @author Nicholas Kreidberg (@niczak)
     *
     */

    public function getLastInsertId($db)
    {
      return $db->lastInsertId();
    }

    /**
     * read function
     * what is in the table right now?
     * let's find out.
     *
     * @return object
     * @author F. Stephen Kirschbaum (@fskirschbaum)
     **/

    public function read()
    {
      $db = new Db();
      $sql = "SELECT * FROM noise";
      $response = $db->query( $sql );
      return $response;
      $db->CloseConnection();
      $db = null;
    }

    /**
     * update function
     *
     * let's update something in db with something else
     *
     * @return int
     * @author F. Stephen Kirschbaum (@fskirschbaum)
     **/

    public function update( $value, $update )
    {
      $db = new Db();
      $sql = "UPDATE noise SET data='$update' WHERE data='$value'";
      $response = $db->query( $sql );
      return $response;
      $db->CloseConnection();
      $db = null;
    }

    /**
     * delete function
     *
     * now it's time to delete something from the database
     * that's fun, right?
     *
     * @return int
     * @author F. Stephen Kirschbaum (@fskirschbaum)
     **/
    public function delete( $delete )
    {
      $db = new Db();
      $sql = "DELETE FROM noise WHERE data='$delete'";
      $response = $db->query( $sql );
      return $response;
      $db->CloseConnection();
      $db = null;
    }

    /**
     * delete_all function
     *
     * now it's time to delete everything from the database
     * boy, this is some dangerous stuff right here!!!
     *
     * @return int
     * @author F. Stephen Kirschbaum (@fskirschbaum)
     **/

    public function delete_all( )
    {
      $db = new Db();
      $sql = "DELETE FROM noise";
      $response = $db->query( $sql );
      return $response;
      $db->CloseConnection();
      $db = null;
    }

  }
?>