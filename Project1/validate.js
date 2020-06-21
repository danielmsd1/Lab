
function validateForm()
{
  var fname = document.forms["userdetails"]["firstname"].value;
  var lname = document.forms["userdetails"]["lastname"].value;
<<<<<<< HEAD
  var cityname = document.forms["userdetails"]["cityname"].value;
=======
  var city = document.forms["userdetails"]["city"].value;
>>>>>>> a8ad71332d32784bb1660c1d4b8c3c122fb3b82d

  //note that userdetails is the name of our forms

  if (fname == null || lname == ""|| cityname == "")
  {
    alert("all details required were not supplied");
    return false;
  }
  return true;
}
