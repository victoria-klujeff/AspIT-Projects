<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     }
     
     $servername = "localhost";
     $usernamedb = "victoria";
     $passworddb = "victoria";
     $namedb = "weirdplantgirl";
  
     $db = new MySQLi($servername, $usernamedb, $passworddb, $namedb); 
    
?>