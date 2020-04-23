<?php
include "Crud.php";

/**
 * This implements the Crud interface; Crud.php
 * All functions are implemented; otherwise an error.
 */
class User implements Crud
{
  private $userid;
  private $firstname;
  private $lastname;
  private $cityname;

  function __construct($firstname,$lastname,$cityname)
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->cityname = $cityname;
  }

  public function setUserid($userid)
  {
    $this->userid = $userid;
  }

  public function getUserid()
  {
    return $this->$userid;
  }

  public function save()
  {
    $fn = $this->firstname;
    $ln = $this->lastname;
    $city = $this->cityname;
    $aVar = mysqli_connect('localhost','root','','ICS3104');
    $res = mysqli_query($aVar,"INSERT INTO user(first_name,last_name,user_city) VALUES('$fn','$ln','$city')")or die(mysqli_error());
    return $res;
  }

  public function readAll()
  {
    $sql = "SELECT first_name, last_name, user_city from  user";
    $aVar = mysqli_connect('localhost','root','','ICS3104');
    $res = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        echo "firstname: " . $row["first_name"]. " - lastname: " . $row["last_name"]. "- Location" . $row["user_city"]. "<br>";
      }
      } else
      {
        echo "0 results";
      }
  }

  public function readUnique()
  {
    return null;
  }

  public function search()
  {
    return null;
  }

  public function update()
  {
    return null;
  }

  public function removeOne()
  {
    return null;
  }

  public function removeAll()
  {
    return null;
  }








}



 ?>
