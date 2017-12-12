<?php
  session_start();
  require 'dbclass.php';
	if($_POST["Email"] == "")
	{
		header("Location: login.php?error=2");
	}
  $_SESSION['Email']= $_POST['Email'];
  $Email = $_POST['Email'];
	$Password =$_POST['Password'];
  $sqlCount ="SELECT COUNT(Email) FROM customers where Email ='$Email'";
  $res = DB::get()->prepare($sqlCount);
  $res->execute();
  $num_rows = $res->fetchColumn();
  $sql = "SELECT Email, Password FROM customers where Email='$Email'";
  $result = DB::get()->prepare($sql);
  $result = DB::get()->query($sql);
  if ($num_rows > 0)
  {
    while($row = $result->fetch())
    {
      if ((strcmp ($Email,$row["Email"])==0) && (password_verify($Password,$row['Password'])))
  	   {
            $_SESSION['validated']=$Email;
  		     header("Location: client.php");
  	    }
        else
        {
  		      header("Location: login.php?error=1");
  	    }
    }
  }
  else {
    header("Location: login.php?error=3");
  }

?>
