<?php 
      
      include "../lib/session.php"; 
      include "../lib/Database.php";
      include "../helpers/format.php"; 

        session::cheaksession();

        $db = new Database();
  		$fm = new format();

  		$id = $_SESSION['userId'];

  		$qry = "SELECT * 
                FROM  `subscribers`
                WHERE `id`   = '$id'";
      
      $result = $db->select($qry);
      
      if($result != false){

          $value = mysqli_fetch_array($result);

    	    $news_types  = $value['types'];

    		  $news_types  = explode(',', $news_types);

    		  $news_papers = $value['newspapers'];

    		  $news_papers = explode(',', $news_papers);
      


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
      <span class="menu-text" =><a href="#" target="_blank" >Settings</a></span>
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
        <a href="../feedback.php">Feedback</a>
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

<!.. form section...!>
<div class="container">
  <div id="personalInfo">
  <form action="update.php" method="POST" >
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="fname" value='<?php echo $value["firstname"]; ?>' > 
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name </label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lname" value='<?php echo $value["lastname"]; ?>' >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email </label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" value='<?php echo $value["email"]; ?>' >
      </div>
      </div>
          <div class="row">
      <div class="col-25">
        <label for="lname">Enter Password </label>
      </div>
      <div class="col-75">
        <input type="Password" id="lname" name="password" placeholder="Your Password" value='<?php echo $value["password"]; ?>' required="password field is empty">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Re-enter Your Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="lname" name="repassword" placeholder="Re-enter Your Password" value='<?php echo $value["password"]; ?>' required="password field is empty">
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

      	<?php  

      		$qry = "SELECT * 
	                FROM  `news_type`";
      
		    $result = $db->select($qry);
		      
		    if($result->num_rows > 0){

          		while ($type = $result->fetch_assoc()) {

         ?>
         		 <label class="checkContainer"><?php echo $type['type']; ?> <input type="Checkbox" class="checkContainer" name="newstype[]" value='<?php echo $type["type"]; ?>' 
         <?php

          			foreach ($news_types as $types) {

          				if($type['type'] == $types) {

          					echo "checked";

          					break;
          				}
          			}
          			
        ?>

   				><span class="checkmark"></span></label><br/>
      
        <?php
        		
    				}
				}
          

      	?>
        
      </div>
    </div>
    <h4>Newspapers</h4>
        <div class="row">
            <div class="col-75">
             
        <?php  

      		$qry = "SELECT * 
	                FROM  `newspapers`";
      
		    $result = $db->select($qry);
		      
		    if($result->num_rows > 0){

          		while ($newspaper = $result->fetch_assoc()) {

        ?>
        	<label class="checkContainer"><?php echo $newspaper['paper']; ?><input type="Checkbox" class="checkContainer" name="newspapers[]" value="<?php echo $newspaper['paper']; ?>"

        <?php
          			foreach($news_papers as $papers) {

          				if($newspaper['paper'] == $papers) {

          					echo "checked";
          					
          					break;
          				}
          			}
        ?>
              ><span class="checkmark"></span></label><br/>
        <?php
				}
          	}

      	?>
            </div>
          </div>
    </div>
     <div class="row">
        <input id="accountButton" type="submit" value="Update" name="signUp">
      </div>
    </div>  
  </form>
</div>
</div>
</body>
</html>

<?php } ?>