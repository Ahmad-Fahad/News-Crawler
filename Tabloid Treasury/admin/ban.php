<?php
ob_start();

include "../lib/session.php"; 
include "../lib/Database.php"; 
include "../methods/popUp.php";

session::cheaksession();

$db = new Database();

$s_id = $_GET['s_id'];

$qry = "DELETE FROM `subscribers`
        WHERE `id`   = '$s_id'";

$result = $db->delete($qry);

if($result) { 

	confirm("The Subscriptions is canceled");

	header("Location: subscribers_list.php");
	
}
else {

	alert("The Subscriptions is canceled");

	header("Location: subscribers_list.php");

}



ob_end_flush();

?>
