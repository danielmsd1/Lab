function validateForm()
{
  var fname = document.forms["userdetails"]["firstname"].value;
  var lname = document.forms["userdetails"]["lastname"].value;
  var cityname = document.forms["userdetails"]["cityname"].value;

  //note that userdetails is the name of our forms

  if (fname == null || lname == ""|| cityname == "")
  {
    alert("all details required were not supplied");
    return false;
  }
  return true;
}
