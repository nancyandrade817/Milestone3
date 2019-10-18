<?php

  // error reporting support
ini_set('display_errors', '1');
ini_set('display_startuperrors', '1');
error_reporting(E_ALL);

// constants
define('HOSTNAME', "Localhost");
define('USERNAME', "root");
define('PASSWORD', "root");
 /* @param dbName
 */

function connect($dbName)
{
    $dbconnect = new mysqli(HOSTNAME, USERNAME, PASSWORD, $dbName);
    if ($dbconnect->connect_error) 
    {
        echo "<p>Connection error: " . $dbconnect->connect_error . "</p";
    } 
    else {
    return $dbconnect;
         }
    
 }

function setUserID($id) 
{
    session_start();
    $_SESSION['USER_ID'] = $id;
    return;
}

function getUserID() 
{
    session_start();
    return $_SESSION['USER_ID'];
}

?>