<?php
/*
 * Basic Site Settings and API Configuration
 */

define('DB_HOST', 'mysql'); 
define('DB_USERNAME', 'u821998666_twautrr'); 
define('DB_PASSWORD', 'FoQgGlm/a4:'); 
define('DB_NAME', 'u821998666_twautrr'); 
define('DB_USER_TBL', 'users'); 

define('TW_CONSUMER_KEY', 'dmc5uvUHLqXnUhrvcW5KEeonF');
define('TW_CONSUMER_SECRET', 'MZ5YPL2qvyrmckXO1GltCa5Wa63qxrBewGftt70HB1U3hLzsZ1');
define('TW_REDIRECT_URL', 'https://vegalms.com/vegafact/');

$servername = DB_HOST;
$database = DB_NAME; 
$username = DB_USERNAME;
$password = DB_PASSWORD;
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object

try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
  
} catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}
// Start session 

// Start session
if(!session_id()){
	session_start();
}
require_once 'twitter-oauth-php/twitteroauth.php';


// Include User class
require_once 'User.class.php';