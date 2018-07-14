<?php

ob_start();

include "../lib/session.php"; 
include "../lib/Database.php"; 
include "../methods/popUp.php";

session::cheaksession();

$db = new Database();

$note_id = $_GET['note_id'];

$qry = "SELECT * 
        FROM `notes`
        WHERE `id`   = '$note_id'";

$result = $db->delete($qry);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Tabloid Treasury</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
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
    <div id="edit_plane">
<?php

if($result) {
  
    $note = mysqli_fetch_array($result);

?>
      <form action="edit_note.php?note_id=<?php echo $note['id']; ?>" method="POST">

        <textarea id="note_editor" name="editor_text">
           <?php echo $note['note']; ?>
        </textarea>

<?php

}

?>
        <input type="submit" id="save_notes" name="save" value="Save">
      </form>
      <script>
        CKEDITOR.replace( 'note_editor' );
      </script>
    </div>

  </div>

</body>
