<?php

//autoloading the packages in the vendor folder
require "vendor/autoload.php";

$config = parse_ini_file('C:\Users\Seth\Desktop\miningappcode\database.ini');
//setting up braintree credentials
Braintree_Configuration::environment($config['environment']);
Braintree_Configuration::merchantId($config['merchantId']);
Braintree_Configuration::publicKey( $config['publicKey']);
Braintree_Configuration::privateKey($config['privateKey']);
//Booting done

?>
