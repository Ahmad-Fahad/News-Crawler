<?php

	if(isset($_POST['crawl'])) {

		$countTitle = 0;

		$countLink  = 0;

		$titles = 0;

		$links  = 0;

		$typeOfNews = $_POST['typeOfNews'];

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

		<?php

		$newsPapers = $_POST['newspapers'];

		foreach ($newsPapers as $newspaper) {

			switch ($newspaper) {
				case 'bbc':
					bbc($typeOfNews);
					break;
				
				default:
					echo "This newspaper is not added in our site";
					break;
			}

		?>
		

  												    	
			<div id="article-container">
				<h3><a href="#"><?php echo $newspaper; ?></a></h3>     
		<?php
		
			}
		
		?>
				<div class="newsItem">	
				<?php

					if($countTitle > 0) {

						for($i=0; $i<15; $i++) {

				?>						  							             
					<h2><?php echo $titles[1][$i]; ?></h2>
					<?php 

						$url = 'http://www.bbc.com'.$links[1][$i]; 
					?>
					<a class="topic-link" href="crawledNews.php?url=<?php echo $url; ?>&newsType=<?php echo $typeOfNews; ?>&newspaper=<?php echo $newspaper; ?>" target="_blank">Read The News</a>
					<hr id="article-hr" align="left">	

					<?php

						}
					}

				}

					?>								
				</div>
			</div>
		</div>
	</div>

<?php

	function bbc($typeOfNews) {

		global $countTitle, $countLink, $titles, $links;

			$url			  = "http://www.bbc.com/news/".$typeOfNews;
			$titleDelimeter   = ' /<span class=\"title-link__title-text\">(.*?)<\/span>/';
			$linkDelimeter    = '/<a href=\"(.*?)\" class="title-link">/';

			include "curl-config/config.php";

			$html = getData($url);

			$countTitle = preg_match_all($titleDelimeter, $html, $titles);

			$countLink  = preg_match_all($linkDelimeter, $html, $links);	

	}
	
	?>