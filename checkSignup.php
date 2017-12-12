<?php
if($_SESSION['validated']){
  Header("Location: client.php");
}
else {
  header("Location: createAccount.php");
}
?>
