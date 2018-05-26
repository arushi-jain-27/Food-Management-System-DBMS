<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'bugs1154';
   $db_name= 'mess';
   $conn =new mysqli($dbhost, $dbuser, $dbpass,$db_name);
   
   if(! $conn ) {
      die("Could not connect: " );
   }
   
   echo " ";
   ?>