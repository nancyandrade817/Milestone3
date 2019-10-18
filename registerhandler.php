<?php
/*
 * Author: Nancy Andrade
 * Date: September 12, 2019
 * File: pagehandler.php
 *
 * This is a php program that enables the registration page to connect
 * to the data base that was created.
 */
// error reporting support

ini_set('display_errors', '1');
ini_set('display_startuperrors', '1');
error_reporting(E_ALL);
//includes & requires
require_once 'myfuncs.php';

// constants

define('EMPTY_STRING', "");
// these are my global variables that I assigned to this program
$dbName = "activity1";
$tableName = "users";

// failure
if (! isset($_POST['submit'])) 
{
    die("Submission failed, no data");
} // success

else {
    // constants
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $userName = trim($_POST['UserName']);
    $password = trim($_POST['Password']);
    }

$dbconnect = new mysqli(HOSTNAME, USERNAME, PASSWORD, $dbName);
    if ($dbconnect->connect_error) 
    {
    echo "<p>Connection error: " . $dbconnect->connect_error . "</p>";
    } 
else {

    echo "<p>" . $firstName . " " . $lastName . "</p>";
    echo "table name: $tableName";
   //if user enters no data echo:
    if ($firstName === NULL || $firstName === EMPTY_STRING) 
    {
        echo "<p> The first name is a <b><em>required</em></b> field 
    and cannot be left blank</p>";
    } else if ($lastName === NULL || $lastName === EMPTY_STRING) 
    {
        echo "<p> The last name is a <b><em>required</em></b> field
    and cannot be left blank</p>";
    } 
    //if successful send data to the databse and echo message
    
    else { // sends to database
        $sql = "INSERT INTO $tableName(FirstName,LastName,
                USERNAME,PASSWORD)
                VALUES('$firstName','$lastName',
            '$userName','$password')";
        if ($result = $dbconnect->query( $sql))
        { //successful registeration
            echo "<p>You are now registered</p>";
        } 
        else {
            echo "<p>Error: " . $dbconnect->error() . "</p>";
        }
        }

    echo "Database Closing";
    $dbconnect->close();
}
?>