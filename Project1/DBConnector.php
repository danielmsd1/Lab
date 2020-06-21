<?php
  define('DB_SERVER','localhost');
  define('DB_USER','root');
  define('DB_PASS','');
  define('DB_NAME','ICS3104');

  class DBConnector
  {
    public $conn;
    function __construct()
    {
        $con = $this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die("Error:".mysqli_error());
        //mysqli_select_db(DB_NAME);
        mysqli_select_db($con, DB_NAME) or die(mysqli_error($con));
    }
    public function closeDatabase()
    {
      mysqli_close($this->conn);
    }
  }
 ?>
