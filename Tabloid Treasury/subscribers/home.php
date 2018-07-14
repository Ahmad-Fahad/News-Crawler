<?php 
      include "../lib/session.php"; 
      include "../lib/Database.php"; 
      include "../curl-config/config.php";

            session::cheaksession();

            $db = new Database();
?>
<?php

    $countTitle = 0;

    $countLink  = 0;

    $titles = 0;

    $links  = 0;

    $typeOfNews = 0;

    $newsPapers = 0;

    $id  = $_SESSION['userId'];

    $db = new Database();

    $qry = "SELECT * 
            FROM  `subscribers`
            WHERE `id`   = '$id'";

        $result = $db->select($qry);

        if($result != false){

            global $newsPapers, $typeOfNews;

            $value = mysqli_fetch_array($result);

		    $types = $value['types']; 

		    $types = explode(',', $types);

		    $newsPapers = $value['newspapers'];

		    $newsPapers = explode(',', $newsPapers);

    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabloid Treasury</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

	<div id="topbar">
		
		<div id="sign-in" class="topbar-section">
			<img id="signin-image" src="../img/signIn.png">
			<span id="signin-text"><a href="logout.php">Log Out</a></span>
		</div>
		<div id="topbar-section topbar-menu">
			<span class="menu-text" =><a href="edit_preferences.php" target="_blank" >Settings</a></span>
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

		<?php  

			foreach($types as $typeOfNews) { 

				foreach ($newsPapers as $newspaper) {


		 ?>

		<div id="main-article">
				<?php   

					// if($typeOfNews == 'politics') {
					// 	$typeOfNews = 'world';
					// }

				 ?>
			<h2><?php echo $typeOfNews; ?></h2>  

		<?php

		
			switch ($newspaper) {
				case 'bbc':
					bbc($typeOfNews);
					break;
				case 'aljazeera':
					aljazeera($typeOfNews);
					break;

				default:
					echo "This newspaper is not added in our site";
					break;
			}



		?>
		

  												    	
			<div id="article-container">
				<h3><a href="#"><?php echo $newspaper; ?></a></h3>     
		<?php
		
			//}
		
		?>
				<div class="newsItem">	
				<?php

					if($countTitle > 0) {

						for($i=0; $i<5; $i++) {

				?>						  							             
					<h2><?php echo $titles[1][$i]; ?></h2>
					<?php 

						//$url = 'http://www.bbc.com'.$links[1][$i]; 

						switch ($newspaper) {
						case 'bbc':
							$url = 'http://www.bbc.com'; 
							break;
						case 'aljazeera':
							$url = 'https://www.aljazeera.com'; 
							break;
						
						
					}

						$url = $url.''.$links[1][$i]; 
					?>
					<a class="topic-link" href="crawledNews.php?url=<?php echo $url; ?>&newsType=<?php echo $typeOfNews; ?>&newspaper=<?php echo $newspaper; ?>" target="_blank">Read The News</a>
					<hr id="article-hr" align="left">	

				<?php

						}
					}

			    ?>								
				</div>
			</div>
		</div>

<?php 

	} 
} 

?>
	</div>

<?php

	function bbc($typeOfNews) {

		global $countTitle, $countLink, $titles, $links;

		    if($typeOfNews == 'politics') {
				$typeOfNews = 'world';
			}

			$url			  = "http://www.bbc.com/news/".$typeOfNews;
			$titleDelimeter   = ' /<span class=\"title-link__title-text\">(.*?)<\/span>/';
			$linkDelimeter    = '/<a href=\"(.*?)\" class="title-link">/';

			$html = getData($url);

			$countTitle = preg_match_all($titleDelimeter, $html, $titles);

			$countLink  = preg_match_all($linkDelimeter, $html, $links);

	}
	
	function aljazeera($typeOfNews) {

		global $countTitle, $countLink, $titles, $links;

		if($typeOfNews == 'politics') {

			$typeOfNews = 'news';

		}

			$url			  = "https://www.aljazeera.com/".$typeOfNews;
			$titleDelimeter   = ' /<h2 class=\"topics-sec-item-head\">(.*?)<\/h2>/';
			$linkDelimeter    = '/<a class=\"centered-video-icon\" href=\"(.*?)\">/';

			$html = getData($url);

			$countTitle = preg_match_all($titleDelimeter, $html, $titles);

			$countLink  = preg_match_all($linkDelimeter, $html, $links);	

	}

	?>