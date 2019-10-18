<?php
/*
 * Author: Nancy Andrade
 * Date: September 12, 2019
 * File: posthandler.php
 *
 * This is a php program that will send blog posts to database
 */
// error reporting support

ini_set('display_errors', '1');
ini_set('display_startuperrors', '1');
error_reporting(E_ALL);
// includes & requires
require_once 'myfuncs.php';

// constants





define('EMPTY_STRING', "");
// these are my global variables that I assigned to this program
$dbName = "activity1";
$tableName = "posts";

// failure
if (!isset($_POST['submit'])) 
{
    die("Submission failed, no data");
} 
// sucess

else {
        $title = trim($_POST["Title"]);
        $content = trim($_POST["Content"]);
        $userID = getUserID();
    }

// accessing the database
$dbconnect = new mysqli(HOSTNAME, USERNAME, PASSWORD, $dbName);

//if there's an error
if ($dbconnect->connect_error) 

    {
        echo "<p>Connection error; " . $dbconnect->connect_error() . "</p>";
    } 
else {

    //displays blog post content user entered
    echo "<p> USER ID: <br>" . $userID . "<br><br>Title:<br><br>" 
        . $title . 
    " <br><br>Content: <br><br> " . $content . "</p>";
    echo "<p>table name: $tableName</p";
    // if blog entry is empty
    if ($title === NULL || $title === EMPTY_STRING) 
    {
        echo "<p> The Title is a <b><em>required</em></b> field 
    and cannot be left blank</p>";
    }// if entry field is left blank
    else if ($content === NULL || $content === EMPTY_STRING) 
    {
        echo "<p> The post Entry  <b><em>required</em></b> field
                  and cannot be left blank</p>";
    } 
    else 
    { // sends entry to database
        $sql = "INSERT INTO $tableName(user_ID_PostBy,Title, Content)
             VALUES('$userID', '$title','$content')";
        if ($result = $dbconnect->query($sql)) 
        { //succecssful post
            echo "<p><br><br>Thank you for posting!</p>";
        } 
        else { //unsuccessful
            echo "<p>Error: " . $dbconnect->error() . "</p>";
             }
     }

    echo "Database Closing";
    $dbconnect->close();
    }
?>
