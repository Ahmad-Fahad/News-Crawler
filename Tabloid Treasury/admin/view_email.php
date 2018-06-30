<?php

ob_start();

include "../lib/session.php"; 
include "../lib/Database.php"; 
include "../methods/popUp.php";

session::cheaksession();

$db = new Database();

if(isset($_GET['email_id'])) {
	
	$id  = $_GET['email_id'];
	$qry = "SELECT * 
    	    FROM  `inbox`
        	WHERE `id` = '$id'";

	$result = $db->select($qry);

	if() {
		
	}
	$qry = "UPDATE `inbox`
			SET `status` = 1
			WHERE `id`   = '$id'";
}

?>

<?php ob_end_flush();  ?>