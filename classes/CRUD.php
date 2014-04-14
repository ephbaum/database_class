<?php

  require_once 'Db.php';
    
  /**
   * CRUD class
   *
   * @package default
   * @author F. Stephen Kirschbaum
   **/
  
  class CRUD
  {
    
    /**
     * search function
     * 
     * here's where we search for stuff
     * this may not be necessary... I could so something else with this.
     *
     * @return void
     * @author F. Stephen Kirschbaum
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
     * @return void
     * @author F. Stephen Kirschbaum
     **/
    
    public function create( $value )
    {
      $db = new Db();
      $sql = "INSERT INTO noise (noise) VALUES ('$value')";
      $response = $db->query( $sql );
      return $response;
      $db->CloseConnection();
      $db = null;
    }
    
    /**
     * read function
     * what is in the table right now?
     * let's find out.
     *
     * @return void
     * @author F. Stephen Kirschbaum
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
     * @return void
     * @author F. Stephen Kirschbaum
     **/
    
    public function update( $value, $update )
    {
      $db = new Db();
      $sql = "UPDATE noise WHERE data='$value' WHERE data='$update' ";
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
     * @return void
     * @author F. Stephen Kirschbaum
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
    
    
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
?>