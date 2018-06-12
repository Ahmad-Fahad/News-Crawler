<?php
		
		if(isset($_GET['url'])) {

			include "curl-config/config.php";

			$url			    = $_GET['url'];
			$typeOfNews         = $_GET['newsType'];
			$newspaper          = $_GET['newspaper'];
			$titleDelimeter     = 0;
			$paragraphDelimeter = 0;

			function bbc() {

				global $titleDelimeter, $paragraphDelimeter;

				$titleDelimeter     = '!<h1 class=\"story-body__h1\">(.*?)<\/h1>!';
				$paragraphDelimeter   = '/<p>(.*?)<\/p>/';

			}

			switch ($newspaper) {
				case 'bbc':
					bbc();
					break;
				
				default:
					echo "This newspaper is not added in our site";
					break;
			}

			

			

			$html = getData($url);

			$countTitle = 0;

			$countPara  = 0;

			$countTitle = preg_match_all($titleDelimeter, $html, $title);

			$countPara  = preg_match_all($paragraphDelimeter, $html, $paragraphs);

			?>
<?php
/*
			

			*/

		}

?>
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


	<div id="page-container">
		<div id="main-article">
			<h2><?php echo $typeOfNews; ?></h2> 
  												    	
			<div id="article-container">
				<h3><a href="#"><?php echo $newspaper; ?></a></h3>  
	
				<div class="newsItem">	

					<h4><a title="Go to the main newspaper site" href="#"><?php echo $title[1][0]; ?></a></h4>
									  							             
					<?php

						for($i=0; $i<$countPara; $i++) {
							echo "<p>".$paragraphs[1][$i]."</p>";
						}


					?>
												 
				</div>
			</div>
		</div>
	</div>

