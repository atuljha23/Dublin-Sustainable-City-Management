function redirectPage()
{
    // console.log('here');

    var userName = document.getElementById('userName').value;
    var userPassword = document.getElementById('paw').value;
    console.log(userName);
    console.log(userPassword);
    if(userName == "DublinBus" && userPassword == "DublinBus")
    {
      window.location = "dashboard.html";
      // return false;
    }
    else if(userName == "DublinBikes" && userPassword == "DublinBikes")
    {
      window.location = "dashboard.html";
      // return false;
    }
    else
    {
      alert("Wrong Credentialsssssssss. Try again !!!!");
    }
  }
