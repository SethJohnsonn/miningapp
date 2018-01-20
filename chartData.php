<?php
session_start();
include 'dbclass.php';
require 'fusioncharts.php';
if($_SESSION['validated'] != ''){

$Email = $_SESSION['Email'];
$sqlCount ="SELECT COUNT(Email) FROM customers where Email ='$Email'";
$res = DB::get()->prepare($sqlCount);
$res->execute();
$num_rows = $res->fetchColumn();
$sql = "SELECT * FROM customers where Email='$Email'";
$results = DB::get()->prepare($sql);
$results = DB::get()->query($sql);
if ($num_rows > 0){
  while($row = $results->fetch())
  {
    $CustomerID=$row['ID'];
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
		$wallet = $row['Wallet'];
  }
  $results=null;
}

//get graph contents from api and do many many string operations to make it work with FusionCharts
$graphcontents = file_get_contents("https://api.nanopool.org/v1/zec/avghashrate/".$wallet);
$extrabs = array("{", ":", "''", "}");
#$graphcontents = str_replace($extrabs, "", $graphcontents);
$stringtoappend = '"';
$graphcontents = ltrim($graphcontents, '{"status":true, "data":');
$graphcontents = rtrim($graphcontents, '"}"');
$graphcontents = $stringtoappend . $graphcontents;

$patterns = array();
$patterns[0] = '/"h1"/';
$patterns[1] = '/"h3"/';
$patterns[2] = '/"h6"/';
$patterns[3] = '/"h12"/';
$patterns[4] = '/"h24"/';

$replacements = array();
$replacements[0] = 'value';
$replacements[1] = 'value';
$replacements[2] = 'value';
$replacements[3] = 'value';
$replacements[4] = 'value';
#echo $graphcontents;

ksort($patterns);
ksort($replacements);
ob_start();
echo preg_replace($patterns, $replacements, $graphcontents);
$jsonArray = ob_get_contents();
ob_end_clean();
$newstr = substr_replace($jsonArray, 'hihihi', 32, 0);
echo($jsonArray);
header('Content-Type: application/json');
#echo json_encode($jsonArray);


}
else {
	header("Location: login.php?error=2");
}
?>
