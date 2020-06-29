<<<<<<< HEAD
 <?php
    include_once 'DBConnector.php';
    include_once 'fileuser.php';
    //$con = new DBConnector;

    if (isset ($_POST['btnsave']))
    {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $city = $_POST['city_name'];

      $user = new User($first_name,$last_name,$city);
      $res = $user->save();

      if ($res)
      {
        echo "Save operation was successful";
      }
      else
      {
        echo "An error occured";
      }
    }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <table align="center">
        <tr>
          <td> <input type="text" name="first_name" required placeholder="First name" value=""/> </td>
        </tr>
        <tr>
          <td> <input type="text" name="last_name" placeholder="Last name" value=""/>   </td>
        </tr>
        <tr>
          <td>  <input type="text" name="city_name" placeholder="City" value="">  </td>
        </tr>
        <tr>
          <td> <button type="submit" name="btnsave"> <strong>SAVE</strong> </button> </td>
        </tr>
      </table>
    </form>
  </body>
</html>
=======
<?php
include_once('DBConnector.php');
include_once('user.php');
$con = new DBConnector; //Database connection is made

if (isset($_POST['submit']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $city = $_POST['city'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = new User($firstname,$lastname,$city,$username,$password);
  if (!$user->validateForm())
  {
    $user->createFormErrorSessions();
    header("Refresh:0");
    die();
  }
  $res1 = $user->isUserExist();
  $res = $user->save();


  if ($res) {
    echo "Save operation was successful";
  }
  else {
    echo "An error occured";
  }
}

if(isset($_POST['btncheck']))
{
  $sql = "SELECT first_name, last_name, user_city from  user";
  $aVar = mysqli_connect('localhost','root','','ICS3104');
  $res = $aVar->query($sql);

  if ($res->num_rows > 0)
  {
    while($row = $res->fetch_assoc())
    {
      echo "Firstname: " . $row["first_name"]. "  Lastname: " . $row["last_name"]. " City: " . $row["user_city"]. "<br>";
    }
  }
  else
    {
      echo "No data found!";
    }
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="lab1.css">
     <link rel="stylesheet" href="validate.css">
     <script type="text/javascript" src="validate.js"></script>
     <title></title>
   </head>

   <body>
     <div class="card" id="header">
       <h2>INPUT YOUR DETAILS IN THE FORM</h2>
     </div>
      <br>
       <form id="mydetails" class="flex-container" method="post" name="userdetails" onsubmit="return validateForm()"action="<?=$_SERVER['PHP_SELF']?>">

        <table align="center">
          <tr>
            <td>
              <div class="" id="form-errors">
                <?php
                    session_start();
                    if (!empty($_SESSION['form_errors']))
                    {
                      echo " ". $_SESSION['form_errors'];
                      unset($_SESSION['form_errors']);
                    }
                 ?>
              </div>
            </td>
          </tr>
          <tr>
            <td><input type="text" name="firstname" required placeholder="Firstname" value="">  </td>
          </tr>
          <tr>
            <td><input type="text" name="lastname" placeholder="Lastname" value=""> </td>
          </tr>
          <tr>
            <td><input type="text" name="city" placeholder="City" value=""> </td>
          </tr>
          <tr>
            <td><input type="text" name="username" placeholder="Username" value=""> </td>
          </tr>
          <tr>
            <td><input type="password" name="password" placeholder="Password" value=""> </td>
          </tr>
          <tr>
            <td><button class="btn btn-primary" type="submit" name="submit">SAVE</button></td>
          </tr>
          <tr>
            <td> <a href="login.php" </td>
          </tr>
          </form>

          <tr>
            <td><button class="btn btn-danger" type="button" name="btndelete">DELETE</button></td>
          </tr>
          <form class="" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <tr>
              <td><button class="btn btn-primary" type="submit" name="btncheck">CHECK RECORDS</button></td>
            </tr>
          </form>
          <tr>
            <td><button class="btn btn-outline-primary" type="button" name="btnnext">NEXT</button></td>
          </tr>
          <tr>
            <td><button class="btn btn-outline-primary" type="button" name="buttonback">BACK</button></td>
          </tr>
          <tr>
            <td> <a href="login.php" </td>
          </tr>
        </table>

   </body>
 </html>
>>>>>>> 78c2b8b850ed33a001185bc554026856d3f958cd
