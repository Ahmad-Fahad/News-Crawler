<?php

	ob_start();

	include "methods/popUp.php";

	if(isset($_POST['signUp'])) {

		include "lib/Database.php";

		$db = new Database();

		$firstname   = $_POST['fname'];
		$lastname    = $_POST['lname'];
		$email       = $_POST['email'];
		$password    = $_POST['password'];
		$repassword  = $_POST['repassword'];
		$newstypes   = $_POST['newstype'];
		$newspapers  = $_POST['newspapers'];

		$newstypes  = implode(',', $newstypes);

		$newspapers = implode(',', $newspapers);

		$qry = "INSERT INTO `subscribers`(`firstname`, `lastname`, `email`, `password`, `types`, `newspapers`)
				VALUES('$firstname', '$lastname', '$email', '$password', '$newstypes', '$newspapers')";

		$result = $db->insert($qry);

		if($result) {
			
			confirm("Your account has been created");

			header("Location: login.php");
		}
		else {
			
			header("Location: createAccount.php");
		}
	}

	ob_end_flush();
?>