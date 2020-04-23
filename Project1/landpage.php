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
  $res = $user->save();

  if ($res) {
    echo "Save operation was successful";
  }
  else {
    echo "An error occured";
  }
}
  $checkrecords = $_POST['btncheck'];
if ($checkrecords) {
  $user->readAll();
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="landpage.css">
     <title></title>
   </head>
   <body>
     <div class="card" id="header">
       <h2>INPUT YOUR DETAILS IN THE FORM</h2>
     </div>
      <br>
       <form id="mydetails" class="flex-container" action="" method="post">
         <input type="text" name="firstname" required placeholder="Firstname" value=""> <br>
         <input type="text" name="lastname" required placeholder="Lastname" value=""> <br>
         <input type="text" name="location" required placeholder="City" value=""> <br>

          <div class="card-danger">
            <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button> <br>
          </div> <br>
          <button class="btn btn-danger" type="button" name="btndelete">DELETE</button> <br>
          <button class="btn btn-primary" type="button" name="btncheck">CHECK RECORDS</button> <br>
          <button class="btn btn-outline-primary" type="button" name="btnnext">NEXT</button> <br>
          <button class="btn btn-outline-primary" type="button" name="button">BACK</button>

       </form>

   </body>
 </html>
