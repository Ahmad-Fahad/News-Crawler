<?php ob_start(); ?>

<?php 
include "../lib/session.php"; 
session::init();
?>
<?php include "../lib/Database.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php 
  $db = new Database();
  $fm = new format();
?>

  <?php  

    $notMatched = 0;
    $notFound   = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

      global $notMatched, $notFound;
      
          $email    = $fm->validation($_POST['email']);
          $password = $fm->validation($_POST['password']);

          $email    = mysqli_real_escape_string($db->link,$email);
          $password = mysqli_real_escape_string($db->link,$password);

          $qry = "SELECT * 
                  FROM  `admin`
                  WHERE `email`   = '$email'
                  AND `password`  = '$password'";
       $result = $db->select($qry);
      if($result->num_rows > 0){
          $value = mysqli_fetch_array($result);
          $row   = mysqli_num_rows($result);
          if ($row > 0) {
             session::set("login",true);
             session::set("email",$value['email']);
             session::set("firstname",$value['firstname']);
             session::set("lastname",$value['lastname']);
             session::set("userId",$value['id']);
             header("Location: index.php");
          }
          else{
            $notFound = 1;
        }
      }
      else{

         $notMatched = 1;
      }
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
        <span id="signin-text"><a href="#">Log In</a></span>
      </div>
      <div id="topbar-section topbar-menu">
        <span class="menu-text" =><a href="send_code.php"> Forgot Password</a></span>
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
          <a href="../index.php">Home</a>
          <a href="../newspapers.php">Newsportal</a>
          <a href="../help.php">Help</a>
          <a href="../feedback.php">Feedback</a>
          <a href="../credit.php">Credit</a>
          <a href="../archive.php">Archive</a>
          <a href="../notes.php">Notes</a>
        </div>
      </div>
    </div>

    <div class="clear"></div>

    <div id="hr">
      <hr>
    </div>

    <div class="clear"></div>


<div class="container">
    <form action="" method="POST">
      <div class="row">
        <div class="col-25">
          <label for="fname">User Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="email" placeholder="Your E-mail address..." required="E-mail field is empty">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Password</label>
        </div>
        <div class="col-75">
          <input type="Password" id="lname" name="password" placeholder="Your Password" required="password field is empty">
        </div>
      </div>
      <div class="row">
        <input type="submit" id="seperate" class="button button1" name="login" value="Log In">
      </div>
    </form>
</div>

<div id="errormsg">
   <?php  

        if($notMatched == 1 ) {
           echo "E-mail and password are not matched";
        }
        if($notFound == 1) {
            echo "Not found";
        }

   ?>
</div>

</body>
</html>

<?php ob_end_flush(); ?>