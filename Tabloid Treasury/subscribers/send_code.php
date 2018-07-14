<?php

ob_start(); 

error_reporting(0);
 ?>

<?php include "../lib/Database.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php include "../methods/popUp.php"; ?>
<?php 

  $db = new Database();
  $fm = new format();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
   
    $qry = "SELECT *
            FROM `subscribers`
            WHERE `email` = '$email'";
    $result = $db->select($qry);

    if($result->num_rows > 0) {

      $sent_code = rand(1000, 9999);

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

      $mail->setFrom(EMAIL, 'Account Varification');
      $mail->addAddress($email);     // Add a recipient

      $mail->addReplyTo(EMAIL);

      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Account Varification';
      $mail->Body    = 'Your email Varification code is '.$sent_code;
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
      $sent_code = md5($sent_code);

      header("Location: code_checker.php?sent_code=$sent_code&email=$email");
      
    }
    else {
      
      alert("Email is not matched");    
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
          <label for="fname">Enter Your E-mail</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="email" placeholder="Your E-mail Address ..." required="This field is empty">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">A code will be sent to your email address for your account verification</label>
        </div>
      </div>
  
      <div class="row">
        <input type="submit" id="seperate" class="button button1" name="submit" value="Send Code">
        
      </div>
    </form>
</div>

<div id="errormsg">

</div>

</body>
</html>

<?php ob_end_flush(); ?>