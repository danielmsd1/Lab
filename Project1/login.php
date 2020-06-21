<?php
  include_once 'DBConnector.php';
  include_once 'user.php';

  $con = new DBConnector;
<<<<<<< HEAD
  if (isset($_POST[btn-login]))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $instance = User::create();
    $instance->setPassword($password);
    $instance->setUsername($username);

    if ($instance->isPasswordCorrect())
    {
    $instance->login();
    $con->closeDatabase();
    //next create a user session
    $instance->createUserSession();
=======

  if (isset($_POST['btnlogin']))
  {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $instance = User::create();
      $instance->setPassword($password);
      $instance->setUsername($username);

    if ($instance->isPasswordCorrect())
    {
      $instance->login();
      $con->closeDatabase();
      //next create a user session
      $instance->createUserSession();
>>>>>>> a8ad71332d32784bb1660c1d4b8c3c122fb3b82d
    }
    else
    {
      $con->closeDatabase();
      header("Location:login.php");
    }
  }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <script type="text/javascript" src="validate.js"></script>
     <link rel="stylesheet" href="validate.css">
   </head>
   <body>
<<<<<<< HEAD
=======

>>>>>>> a8ad71332d32784bb1660c1d4b8c3c122fb3b82d
     <form class="" name = "login" action="<?=$_SERVER['PHP_SELF']?>" method="post">
       <table align="center">
         <tr>
           <td><input type="text" name="username" placeholder="Username" required value=""> </td>
         </tr>
         <tr>
           <td><input type="password" name="password" placeholder="Password" required value=""> </td>
         </tr>
         <tr>
           <td> <button type="submit" name="btnlogin"> <strong>LOGIN</strong> </button> </td>
         </tr>
       </table>
     </form>

   </body>
 </html>
