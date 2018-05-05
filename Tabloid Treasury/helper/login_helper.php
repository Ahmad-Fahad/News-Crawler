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
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="action.css">
</head>
<body>
<div class="container">
	<section id="content">
	<?php  
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$username = $fm->validation($_POST['username']);
			$password = $fm->validation($_POST['password']);

			$username = mysqli_real_escape_string($db->link,$username);
			$password = mysqli_real_escape_string($db->link,$password);

			$qry = "SELECT * 
					FROM  `dbl_user`
					WHERE `username`= '$username'
					AND `passward` = '$password'";
			$result = $db->select($qry);
			if($result != false){
					$value = mysqli_fetch_array($result);
					$row   = mysqli_num_rows($result);
					if ($row > 0) {
						 session::set("login",true);
						 session::set("username",$value['username']);
						 session::set("userId",$value['id']);
						 header("Location: index.php");
					}
					else{
						echo "<span style = 'color : red; font-size : 18px; ' >No Result Found</span>";
					}
			}
			else{
				echo "<span style = 'color : red; font-size : 18px; ' >Username and Password are not matched</span>";
			}
		}

	 ?>
		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">CoderKnight</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
<?php ob_end_flush(); ?>