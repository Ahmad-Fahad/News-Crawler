<?php ob_start(); ?>

<?php 
      include "../lib/session.php";

            session::cheaksession();

            session::destroy();

            header("Location: ../login.php");
 ?>
            
<?php ob_end_flush(); ?>
