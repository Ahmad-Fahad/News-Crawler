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
				<a href="home.php">Home</a>
		        <a href="../newspapers.php">Newspapers</a>
		        <a href="../help.php">Help</a>
		        <a href="#">Feedback</a>
		        <a href="../credit.php">Credit</a>
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

	<!.. page name...!>

	<div id="page-container">
		<div id="main-article">
			<h2>Feedback</h2>
		</div>
	</div>

	<div class="clear"></div>


	<!.. form section...!>
<div class="feedbackContainer">
  <form action="" method="POST" >
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="fname" placeholder="Enter your first name...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name  </label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lname" placeholder="Your last name...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Your E-mail  </label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="Your email address...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="feedback">Your Messase   </label>
      </div>
      <div class="col-75">
        <input type="textarea" id="feedback" name="feedback" placeholder="Your feedback...">
      </div>
    </div>
    <div class="row">
      <input id="feedbackbutton" type="submit" value="Send">
    </div>
  </form>

