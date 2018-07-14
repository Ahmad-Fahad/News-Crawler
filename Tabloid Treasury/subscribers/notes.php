<?php

include "../lib/session.php"; 
include "../lib/Database.php"; 
include "../methods/popUp.php";

session::cheaksession();

$id  = $_SESSION['userId'];

$db = new Database();

$qry = "SELECT * 
        FROM  `notes`
        WHERE `s_id`   = '$id'";

$result = $db->select($qry);

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
      <span class="menu-text" =><a href="edit_preferences.php">Settings</a></span>
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
        <a href="#">Notes</a>
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
      <h2>Notes</h2>
    </div>

<?php

if($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

?>
    <div id="note">
      <div id="date">
          <p><?php echo $row['date']; ?></p>  
      </div>
      <div id="note_section">
        <p><?php echo $row['note']; ?> </p>        
      </div>
      <div id="reference">
        
        <div id="about_news">
          <h2><?php echo $row['newspaper']; ?></h2>
          <h3><?php echo $row['newstype']; ?></h3>
          <div id="actions">
            <a id="edit" href="edit_note_interface.php?note_id=<?php echo $row['id']?>">edit</a>
            <a id="delete" href="delete_note.php?note_id=<?php echo $row['id']?>">delete</a>
          </div>
          <div id="go_site">
            <a href="<?php echo $row['url']; ?>">Go to the news</a>
          </div>
        </div>
      </div>
      
    </div>
<?php

    }
}


?>

  </div>

  <div class="clear"></div>
  
