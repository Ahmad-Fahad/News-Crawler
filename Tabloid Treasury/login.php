<!DOCTYPE html>
<html>
<head>
  <title>Tabloid Treasury</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="topbar">
    <div id="sign-in" class="topbar-section">
      <img id="signin-image" src="img/signIn.png">
      <span id="signin-text"><a href="#">Log In</a></span>
    </div>
    <div id="topbar-section topbar-menu">
      <span class="menu-text" =><a href="createAccount.php"> Create Account</a></span>
    </div>
  </div>
  <div class="clear">
    
  </div>
  <div id="menu-bar-container">
    <div id="menu-bar">
      <h1>Tabloid Treasury</h1>
    </div>

    <div class="clear"></div>

    <div id="menu-bar-2-container">
      <div id="menu-bar-2">
        <a href="index.php">Home</a>
        <a href="newspapers.php">Newspapers</a>
        <a href="help.php">Help</a>
        <a href="feedback.php">Feedback</a>
        <a href="credit.php">Credit</a>
        <a href="archive.php">Archive</a>
        <a href="notes.php">Notes</a>
      </div>
    </div>
  </div>

  <div class="clear"></div>

  <div id="hr">
    <hr>
  </div>

  <div class="clear"></div>


<div class="container">
  <form action="login.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">User Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="username" placeholder="Your username.." required="username field is empty">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="lname" name="password" placeholder="Your Password" required="password field is empty">
      </div>
    </div>
    <div class="row">
      <input type="submit" id="seperate" class="button button1" name="login" value="Log In">
    </div>
  </form>

  <div>

  </div>
</div>

</body>
</html>
