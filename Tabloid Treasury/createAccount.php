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
      <span id="signin-text"><a href="login.php">Log In</a></span>
    </div>
    <div id="topbar-section topbar-menu">
      <span class="menu-text" =><a href="#"> Create Account</a></span>
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

<!.. form section...!>
<div class="container">
  <div id="personalInfo">
  <form action="" method="POST" >
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="fname" placeholder="Enter first name...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name </label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lname" placeholder="Your last name...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email </label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="Your email address...">
      </div>
      </div>
          <div class="row">
      <div class="col-25">
        <label for="lname">Enter Password </label>
      </div>
      <div class="col-75">
        <input type="Password" id="lname" name="password" placeholder="Your Password" required="password field is empty">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Re-enter Your Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="lname" name="password" placeholder="Re-enter Your Password" required="password field is empty">
      </div>
    </div>
    </div>


    <!..preferences .!>

    <div id="preferences">
    <div class="row"><h2>Preferences </h2></div>
    

    <div class="row">
      <div class="col-25">
        <label for="lname">News Type </label>
      </div>
      <div class="col-75">
        <label class="checkContainer">Politics <input type="Checkbox" name="newstype[]" value="politics"><span class="checkmark"></span></label><br/>
        <label class="checkContainer">Bangladesh <input type="Checkbox" class="checkContainer" name="newstype[]" value="bangladesh"><span class="checkmark"></span></label><br/>
        <label class="checkContainer">Economics<input type="Checkbox" class="checkContainer" name="newstype[]" value="economics"><span class="checkmark"></span></label><br/>
        <label class="checkContainer">Lifestyle<input type="Checkbox" class="checkContainer" name="newstype[]" value="lifestyle"><span class="checkmark"></span></label><br/>
        <label class="checkContainer">International<input type="Checkbox" class="checkContainer" name="newstype[]" value="international"><span class="checkmark"></span></label><br/>
        <label class="checkContainer">Technology<input type="Checkbox" class="checkContainer" name="newstype[]" value="technology"><span class="checkmark"></span></label><br/>
        <label class="checkContainer">Entertainment<input type="Checkbox" class="checkContainer" name="newstype[]" value="entertainment"><span class="checkmark"></span></label><br/>
        <label class="checkContainer">Game Zones <input type="Checkbox" class="checkContainer" name="newstype[]" value="games"><span class="checkmark"></span></label><br/>
      </div>
    </div>
    <h4>Newspapers</h4>
        <div class="row">
            <div class="col-75">
             
              <label class="checkContainer">Aljazeera<input type="Checkbox" class="checkContainer" name="newstype[]" value="aljazeera"><span class="checkmark"></span></label><br/>
              <label class="checkContainer">Arabian News<input type="Checkbox" class="checkContainer" name="newstype[]" value="arabian_news"><span class="checkmark"></span></label><br/>
              <label class="checkContainer">Newyork Times<input type="Checkbox" class="checkContainer" name="newstype[]" value="newyork_times"><span class="checkmark"></span></label><br/>
              <label class="checkContainer">BBC<input type="Checkbox" class="checkContainer" name="newstype[]" value="bbc"><span class="checkmark"></span></label><br/>
              <label class="checkContainer">CNN<input type="Checkbox" class="checkContainer" name="newstype[]" value="cnn"><span class="checkmark"></span></label><br/>
            </div>
          </div>
    </div>
     <div class="row">
        <input id="accountButton" type="submit" value="Sign Up">
      </div>
    </div>  
  </form>
</div>
</div>
</body>
</html>

