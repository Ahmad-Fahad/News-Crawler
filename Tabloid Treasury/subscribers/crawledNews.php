<?php
		include "../lib/session.php"; 
	    include "../lib/Database.php"; 
	    include "../helpers/format.php";
	    include "../curl-config/config.php";
	    include "../methods/popUp.php";
	    //include "../RE_config/config.php";

        session::cheaksession();

        $db = new Database();
		$fm = new format();

		if(isset($_GET['url'])) {

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
			function aljazeera() {

				global $titleDelimeter, $paragraphDelimeter;

				$titleDelimeter     = '!<h1 class=\"post-title\">(.*?)<\/h1>!';
				$paragraphDelimeter   = '/<p>(.*?)<\/p>/';

			}

			switch ($newspaper) {
				case 'bbc':
					bbc();
					break;
				case 'aljazeera':
					aljazeera();
					break;
				
				default:
					echo "This newspaper is not added in our site";
					break;
			}

			

			//include "curl-config/config.php";

			$html = getData($url);

			$countTitle = 0;

			$countPara  = 0;

			$countTitle = preg_match_all($titleDelimeter, $html, $title);

			$countPara  = preg_match_all($paragraphDelimeter, $html, $paragraphs);



?>

<?php

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$url  		= $_GET['url'];
		$newsType   = $_GET['newsType'];
		$newspaper  = $_GET['newspaper'];
		$note 		= $_POST['editor'];

		$s_id       = $_SESSION['userId'];

		$note 		= $fm->validation($note);

		$note       = mysqli_real_escape_string($db->link,$note);

		$qry = "INSERT INTO `notes`(`s_id`, `note`, `url`, `newstype`, `newspaper`)
				VALUES('$s_id', '$note', '$url', '$newsType', '$newspaper')";

		$result = $db->insert($qry);

		if($result) {
			
			confirm("Your note is saved");

			
		}
		else {
			
			alert("Your note is not saved");

			
		}
	}

?>	

<?php

  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tabloid Treasury</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="//cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script>
</head>

<body>

	<div id="topbar">
		
		<div id="sign-in" class="topbar-section">
			<img id="signin-image" src="../img/signIn.png">
			<span id="signin-text"><a href="logout.php">Log Out</a></span>
		</div>
		<div id="topbar-section topbar-menu">
			<span class="menu-text" =><a href="edit_preferences.php"> Settings</a></span>
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
		<div id="notes">
			<h3>Take Short Notes</h3>
			<form action="" method="POST">
				<textarea id="editor" name="editor"></textarea>
				<input type="submit" id="save_notes" name="save" value="Save Notes">
			</form>
			<script>
				CKEDITOR.replace( 'editor' );
			</script>
		</div>
	</div>

