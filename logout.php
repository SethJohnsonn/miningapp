<?php
        session_start();

        if($_SESSION['validated'] = "")
        {
                header("Location: login.php?error=2");
        }
        unset($_SESSION);
  	    session_destroy();
        header("Location: index.php");
?>
