<?php ob_start(); ?>

<?php include "../lib/Database.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php include "../methods/popUp.php"; ?>
<?php 
  $db = new Database();
  $fm = new format();
?>
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $entered_code = $_POST['code'];
    $entered_code = md5($entered_code);
    $sent_code = $_GET['sent_code'];
    $email = $_GET['email'];

    if($entered_code == $sent_code) {

          $qry = "SELECT * 
                  FROM  `admin`
                  WHERE `email`   = '$email'";

          $result = $db->select($qry);
          $value = mysqli_fetch_array($result);

          $password = $value['password'];

          /*

start email sending section

*/
      require 'PHPMailerAutoload.php';
      require 'credential.php';

      $mail = new PHPMailer;

      //$mail->SMTPDebug = 4;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = EMAIL;                 // SMTP username
      $mail->Password = PASS;                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom(EMAIL, 'Admin Account Confirmed');
      $mail->addAddress($email);     // Add a recipient

      $mail->addReplyTo(EMAIL);

      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Admin Account Confirmation';
      $mail->Body    = 'Ok. this is your account and this is Your password is '.$password;
      $mail->AltBody = 'This mail is for account Varification and this code will not be used in future';

      if(!$mail->send()) {
          alert('Message could not be sent.');
          //echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          confirm('Message has been sent');
      }

/*

end of email sending section

*/

          confirm("Your password is sent to your mail address. Try again");

          header("Location: login.php");
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
        <span id="signin-text"><a href="login.php">Log In</a></span>
      </div>
      <div id="topbar-section topbar-menu">
        <span class="menu-text" =><a href="../createAccount.php"> Create Account</a></span>
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
          <a href="../newspapers.php">News portal</a>
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
          <label for="fname">Enter Code</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="code" placeholder="Your Code ..." required="This field is empty">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">If you did not get the code then go to the previous page and try the process again</label>
        </div>
      </div>
      
      <div class="row">
        <input type="submit" id="seperate" class="button button1" name="submit" value="Submit Code">
        
      </div>
    </form>
</div>

<div id="errormsg">

</div>

</body>
</html>

<?php ob_end_flush(); ?>