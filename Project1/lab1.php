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
