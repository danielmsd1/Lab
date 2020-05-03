<?php
include_once('DBConnector.php');
include_once('user.php');
$con = new DBConnector; //Database connection is made

if (isset($_POST['submit']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $city = $_POST['location'];

  $user = new User($firstname,$lastname,$city);
  if (!$user->validateForm())
  {
    $user->createFormErrorSessions();
    header("Refresh:0");
    die();
  }
  $res = $user->save();

  if ($res) {
    echo "Save operation was successful";
  }
  else {
    echo "An error occured";
  }
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="landpage.css">
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
            <td><input type="text" name="location" placeholder="City" value=""> </td>
          </tr>
          <tr>
            <td><input type="text" name="username" placeholder="Username" value=""> </td>
          </tr>
          <tr>
            <td><input type="password" name="password" placeholder="Password" value=""> </td>
          </tr>
          <tr>
            <td><button class="btn btn-primary" type="submit" name="submit"></button>SAVE</td>
          </tr>
          <tr>
            <td><button class="btn btn-danger" type="button" name="btndelete">DELETE</button></td>
          </tr>
          <tr>
            <td><button class="btn btn-primary" type="button" name="btncheck">CHECK RECORDS</button></td>
          </tr>
          <tr>
            <td><button class="btn btn-outline-primary" type="button" name="btnnext">NEXT</button></td>
          </tr>
          <tr>
            <td><button class="btn btn-outline-primary" type="button" name="button">BACK</button></td>
          </tr>
          <tr>
            <td> <a href="login.php" </td>
          </tr>
        </table>

       </form>
   </body>
 </html>
