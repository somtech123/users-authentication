<?php

 class Dbh{
     
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'auth';

  protected  function connect(){
    try{
      $host = 'localhost';
      $username = 'root';
      $password = '';
      //$dsn = 'mysqli:host=localhost;dbname=auth';
      
     $dsn = 'mysqli:host' . $this->host . ';dbname' . $this->dbname;
      $dbh = new PDO($dsn, $this->user, $this->password);
      
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      return $dbh;
  }
  catch(PDOException $e){
      //print "Error!: " . $e->getMessage() . "<br/>";
      //die();
      //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;

  }


  }
}
 










