function Forgot()
{
    // console.log('here');

    var userName = document.getElementById('userName').value;
    var userSecurity = document.getElementById('security').value;
    console.log(userName);
    console.log(userSecurity);
    if(userName == "DublinBus" && userSecurity == "Dublin")
    {
      alert("Hi! User, your password has been sent to your email address.");
      // return false;
    }
    else if(userName == "DublinBikes" && userPassword == "Cork")
    {
        alert("Hi! User, your password has been sent to your email address.");
      // return false;
    }
    else
    {
      alert("Wrong Security Answer. Please Contact Admin");
    }
  }
