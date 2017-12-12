<?php
session_start();
require 'dbclass.php';

//insert new item into database using prepared statements
$hash=password_hash($_POST['Password'],PASSWORD_DEFAULT);
$sth = DB::get()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sth = DB::get()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sth = DB::get()->prepare("INSERT INTO customers (FirstName,LastName, Email, Password)
VALUES (:FirstName,:LastName, :Email,:Password)");
$sth ->bindParam(':FirstName',$_POST['fname']);
$sth ->bindParam(':LastName',$_POST['lname']);
$sth ->bindParam(':Email',$_POST['email']);
$sth ->bindParam(':Password',$hash);
$sth ->execute();
header('Location: client.php?status=1');
$sth =null;
?>
