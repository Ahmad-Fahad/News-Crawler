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
				<a href="#">Home</a>
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

	<div id="page-container">
		
		<div id="main-article">
			<h2>Home</h2>
			<div id="article-container">
				<h3><a href="#">News Type</a></h3>
				<form action="#" method="POST">
					<div class="row">
				      <div class="col-25">
				        <label for="country">Select a Type of News</label>
				      </div>
				      <div class="col-75">
				        <select id="country" name="typeOfPassword">
				          <option value="politics">Politics</option>
				          <option value="bangladesh">Bangladesh</option>
				          <option value="economics">Economics</option>
				          <option value="lifestyle">Life Style</option>
				          <option value="international">International</option>
				          <option value="technology">Technology</option>
				          <option value="entertainment">Entertainment</option>
				          <option value="games">Game Zone</option>
				      </div>
				    </div>
				    <div class="row">
				<input type="submit" value="Crawl">
			</div>
		</form>
			</div>
		</div>

		<div class="clear"></div>

		<div id="side-bar">
			<h4>Newspapers</h4>
		    <div class="row">
			      <div class="col-75">
			        <label class="checkContainer">Prothom Alo <input type="Checkbox" name="newstype[]" value="prothon_alo"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">Noya Diganta <input type="Checkbox" class="checkContainer" name="newstype[]" value="noya_diganta"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">Amar Desh<input type="Checkbox" class="checkContainer" name="newstype[]" value="amar_desh"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">Ittefaq<input type="Checkbox" class="checkContainer" name="newstype[]" value="ittefaq"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">Inkilab<input type="Checkbox" class="checkContainer" name="newstype[]" value="inkilab"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">The Daily Star<input type="Checkbox" class="checkContainer" name="newstype[]" value="daily_star"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">Aljazeera<input type="Checkbox" class="checkContainer" name="newstype[]" value="aljazeera"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">Arabian News<input type="Checkbox" class="checkContainer" name="newstype[]" value="arabian_news"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">Newyork Times<input type="Checkbox" class="checkContainer" name="newstype[]" value="newyork_times"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">BBC<input type="Checkbox" class="checkContainer" name="newstype[]" value="bbc"><span class="checkmark"></span></label><br/>
			        <label class="checkContainer">CNN<input type="Checkbox" class="checkContainer" name="newstype[]" value="cnn"><span class="checkmark"></span></label><br/>
			        
			      </div>
			    </div>
			<div class="clear"></div>
		</div>
		
	</div>
</body>

</html>