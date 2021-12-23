<?php 

ob_start();

		include "../lib/session.php"; 
	    include "../lib/Database.php";
	    include "../helpers/format.php"; 
	    include "../methods/popUp.php";

        session::cheaksession();

		$db = new Database();

	if(isset($_POST['signUp'])) {

		$id = $_SESSION['userId'];

		$firstname   = $_POST['fname'];
		$lastname    = $_POST['lname'];
		$email       = $_POST['email'];
		$password    = $_POST['password'];
		$repassword  = $_POST['repassword'];
		$newstypes   = $_POST['newstype'];
		$newspapers  = $_POST['newspapers'];

		$newstypes  = implode(',', $newstypes);

		$newspapers = implode(',', $newspapers);

		$qry = "UPDATE `subscribers`
				SET
				`firstname` = '$firstname',
				`lastname`  = '$lastname',
				`email`	    = '$email', 
				`password`  = '$password', 
				`types`		= '$newstypes',
				`newspapers`= '$newspapers'
				WHERE `id`  = '$id'";

		$result = $db->update($qry);

		if($result) {
			
			confirm("Your account has been updated");

			header("Location: home.php");
		}
		else {
			
			header("Location: createAccount.php");
		}
	}

ob_end_flush();

                        
?>