<?php
ob_start();

include "../lib/session.php"; 
include "../lib/Database.php"; 
include "../methods/popUp.php";

session::cheaksession();

$db = new Database();

$note_id = $_GET['note_id'];

$qry = "DELETE FROM `notes`
        WHERE `id`   = '$note_id'";

$result = $db->delete($qry);

if($result) { 

	confirm("The note is deleted");

	header("Location: notes.php");
	
}
else {

	alert("Your note is not deleted");

	header("Location: notes.php");

}



ob_end_flush();

?>
