<?php

ob_start();

include "../lib/session.php"; 
include "../lib/Database.php"; 
include "../methods/popUp.php";

session::cheaksession();

$id  = $_SESSION['userId'];

$db = new Database();

$qry = "SELECT * 
        FROM  `subscribers`";

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
      <div id="menu-bar-top">
        <ul>
          <li><a href="index.php">Dashboard</a></li>
          <li><a href="#">Inbox</a></li>
          <li><a href="#">Subscribers List</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="clear"></div>

  <div class="clear"></div>

<!.. page name...!>

  <div id="admin-page-container">

    <div class="sidenav">
        <a href="#">Title & Copyright</a>
        <a href="#">Newspapers URL</a>
        <a href="#">Regulalar Expressions</a>
        <a href="#">About yourself</a>
        <a href="#">Guide line</a>
        <a href="#">Add newspaper</a>
        <a href="#">Add type</a>
    </div>

    <div id="list_pane">
       <table id="subscribers">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Newspapers</th>
            <th>News Types</th>
            <th>Actions</th>
          </tr>
<?php

if($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        
?>

          <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['newspapers']; ?></td>
            <td><?php echo $row['types']; ?></td>
            <td><a id="ban" href="ban.php?s_id=<?php echo $row['id']; ?>">Ban Him</a></td>
          </tr>
<?php

  }
}

?>


  
</table>

    </div>

  </div>

</body>

<?php ob_end_flush(); ?>