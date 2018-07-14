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
			<span id="signin-text"><a href="subscribers/login.php">Log In</a></span>
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
				<a href="#">Home</a>
		        <a href="newspapers.php">News portal</a>
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

	<div id="page-container">
		
		<div id="main-article">
			<h2>Home</h2>
			<div id="article-container">
				<h3><a href="#">News Type</a></h3>
				<form action="newsItems.php" method="POST" target="_blank" >
					<div class="row">
				      <div class="col-25">
				        <label for="country">Select a Type of News</label>
				      </div>
				      <div class="col-75">
				        <select id="country" name="typeOfNews">
				          <option value="politics">Politics</option>
				          <option value="economics">Economics</option>
				          <option value="lifestyle">Life Style</option>
				          <option value="international">International</option>
				          <option value="technology">Technology</option>
				          <option value="entertainment">Entertainment</option>
				          <option value="games">Game Zone</option>
				      </select>
				      </div>
				    </div>
			<div class="row">
				<input type="submit" value="Crawl" name="crawl">
			</div>
			</div>
		</div>

		<div class="clear"></div>

		<div id="side-bar">
			<h4>News portals</h4>
		    <div class="row">
			        <div class="col-75">
			        	<label class="checkContainer">নয়া দিগন্ত<input type="Checkbox" class="checkContainer" name="newspapers[]" value="dailynayadiganta"><span class="checkmark"></span></label><br/>
			        	<label class="checkContainer">প্রথম আলো<input type="Checkbox" class="checkContainer" name="newspapers[]" value="prothomalo"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">Aljazeera<input type="Checkbox" class="checkContainer" name="newspapers[]" value="aljazeera"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">Arabian News<input type="Checkbox" class="checkContainer" name="newspapers[]" value="arabian_news"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">Newyork Times<input type="Checkbox" class="checkContainer" name="newspapers[]" value="newyork_times"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">BBC<input type="Checkbox" class="checkContainer" name="newspapers[]" value="bbc"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">CNN<input type="Checkbox" class="checkContainer" name="newspapers[]" value="cnn"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">The Times of India<input type="Checkbox" class="checkContainer" name="newspapers[]" value="the_times_of_india"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">USA Today<input type="Checkbox" class="checkContainer" name="newspapers[]" value="usa_today"><span class="checkmark"></span></label><br/>
				        <label class="checkContainer">People's Daily<input type="Checkbox" class="checkContainer" name="newspapers[]" value="peoples_daily"><span class="checkmark"></span></label><br/>
			        </div>
			    </div>
			</form>
			<div class="clear"></div>
		</div>
	</div>
</body>

</html>