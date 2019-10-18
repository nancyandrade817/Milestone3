<?php
/*
 * Author: Nancy Andrade
 * Date: September 17, 2019
 * File: getAllUsers.php
 *
 * This is a php program that retrieves all useres
 */
//error reporting support
ini_set('display_errors', '1');
ini_set('display_startuperrors', '1');
error_reporting(E_ALL);

//constants
define('HOSTNAME',"Localhost");
define('USERNAME', "root");
define ('PASSWORD',"root");
define('EMPTY_STRING', "");

//these are my global variables that I assigned to this program
$dbName = "activity1";
$tableName = "users";




echo"<h2>Activity 3</h2>";
$dbconnect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD);
if (!$dbconnect)   
{
    echo "<p>Connection error: " . mysqli_connect_error() . "</p>";
}
else {
    if(mysqli_select_db($dbconnect, $dbName)) 
    {
        //connecting to database
        echo"<p>Successfully selected the " . $dbName .
        "database.</p>";
        
        echo"table name: $tableName";
        
  //gathering the data from the database
    $sql = "SELECT ID, FirstName, Lastname  FROM $tableName";
     if($result = mysqli_query($dbconnect, $sql)) 
      {
       echo "<h3>Users</h3>";
       }
       if (mysqli_num_rows($result) > 0) 
 {
 //echo "<p>Number of rows in 
 //<strong>$tableName</strong>" . 
 //mysqli_num_rows($result) . "</p>"; 
 //display the users registerd
 $rowNumber = 0;
    while ($row = mysqli_fetch_assoc($result)) 
    {
     ++$rowNumber;
     echo "<strong>$rowNumber</strong>. ";
     foreach ($row as $column) 
     {
       echo "$column ";
                            
      }
       echo"<br>";
}
            
}
           
             
else 
  { // if registeration is unsuccessful
    echo "<p>No users are registered</p>";
  }
            
        
    }
    //if not successful
    else {
        echo"<p>Could not select the " . $dbName .
        "database.</p><br>";
    }
    //close database
    echo "Database Closing";
    mysqli_close($dbconnect);
}
?>