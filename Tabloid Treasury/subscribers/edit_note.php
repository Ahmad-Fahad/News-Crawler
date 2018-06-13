<?php
ob_start();

include "../lib/session.php"; 
include "../lib/Database.php"; 
include "../methods/popUp.php";

session::cheaksession();

if($_SERVER['REQUEST_METHOD'] == "POST") {

	$db = new Database();

	$note_id = $_GET['note_id'];

	$note    = $_POST['editor_text'];

	$qry = "UPDATE `notes`
			SET
			`note` = '$note'
			WHERE `id`  = '$note_id'";

	$result = $db->update($qry);

	if($result) { 

		confirm("The note is Updated");

		header("Location: notes.php");
		
	}
	else {

		alert("Your note is not Updated");

		header("Location: notes.php");

	}


}


ob_end_flush();

?>
