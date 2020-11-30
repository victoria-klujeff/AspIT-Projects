<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     }
     
 
     $servername = "localhost";
     $usernamedb = "victoria";
     $passworddb = "victoria";
     $namedb = "starupuif";
  
     $db = new MySQLi($servername, $usernamedb, $passworddb, $namedb); 
?>