function redirectPage()
{
    // console.log('here');

    var userName = document.getElementById('Username').value;
    var userPassword = document.getElementById('Password').value;
    console.log(userName);
    console.log(userPassword);
    if(userName == "user" && userPassword == "password")
    {
      window.location = "dashboard.html";
      // return false;
    }
    else if(userName == "user2" && userPassword == "password2")
    {
      window.location = "dashboard.html";
      // return false;
    }
    else
    {
      $.notify(
        "Wrong Credentials. Try again !!!",
        { position:"right" }
        );
    }
  }
