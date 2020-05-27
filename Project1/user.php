<?php
include "Crud.php";
include "authenticator.php";

/**
 * This implements the Crud interface; Crud.php
 * All functions are implemented; otherwise an error.
 */
class User implements Crud
{
  private $userid;
  private $firstname;
  private $lastname;
  private $city;
  private $username;
  private $password;

  function __construct($firstname,$lastname,$city,$username,$password)
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->city = $city;
    $this->username = $username;
    $this->password = $password;
  }
  /**
  *PHP does not allow multiple constructors
  *We make a static method to access it with a class rather than an object
  *static constructor
  */
  public static function create()
  {
    $instance = new self();
    return $instance;
  }
  //username setter
  public function setUsername($username)
  {
    $this->username = $username;
  }
  //username getter
  public function getUsername()
  {
    return $this->username;
  }
  //password setter
  public function setPassword($password)
  {
    $this->password = $password;
  }
  //password getter
  public function getPassword()
  {
    return $this->password;
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
    $city = $this->city;
    $uname = $this->username;
    $this->hashPassword();
    $pass = $this->password;
    $aVar = mysqli_connect('localhost','root','','ICS3104');
    $res = mysqli_query($aVar,"INSERT INTO user(first_name,last_name,user_city,username,password) VALUES('$fn','$ln','$city','$uname','$pass')")or die(mysqli_error());
    return $res;
  }
//check function and see if firstname and lastname exist;;;;;
  public function readAll()
  {
    $sql = "SELECT first_name, last_name, user_city from  user";
    $aVar = mysqli_connect('localhost','root','','ICS3104');
    $res = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        echo "firstname: " . $row["first_name"]. " - lastname: " . $row["last_name"]. "- City" . $row["user_city"]. "<br>";
      }
    }
     else
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

  public function validateForm()
  {
    //Return true if the values are not Empty
    $fn = $this->firstname;
    $ln = $this->lastname;
    $city = $this->city;
    $username = $this->username;
    $password = $this->password;

    if ($fn == "" || $ln == "" || $city == "" || $username == "" || $password == "")
    {
      return false;
    }
    return true;
  }

  public function createFormErrorSessions()
  {
    session_start();
    $_SESSION['form_errors'] = "All fields are required";
  }

  public function hashPassword()
  {
    //inbuilt function password_hash hashes our password
    $this->password = password_hash($this->password,PASSWORD_DEFAULT);
  }
  public function isPasswordCorrect()
  {
    $con = new DBConnector();
    $found = false;
    $res = mysqli_query("SELECT * FROM user") or die("Error" . mysqli_error());

    while($row=mysqli_fetch_array($res))
    {
      if (password_verify($this->getPassword(),$row['password']) && $this->getUsername() == $row['username']) {
          $found = true;

      }
    }
    //close the database connection
    $con->closeDatabase();
    return $found;
  }

  public function login()
  {
    if ($this->isPasswordCorrect()) {
      //password is correct, so we open the protected page
      header("Location:private_page.php");
    }
  }

  public function createUserSession()
  {
    session_start();
    $_SESSION['username'] = $this->getUsername();
  }

  public function logout()
  {
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    header("Location:landpage.php");
  }


}

 ?>
