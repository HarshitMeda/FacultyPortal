<?php
  
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = postgres";    
   $credentials = "user = postgres password=postgres";

   $con = pg_connect( "$host $port $dbname $credentials"  );
   if(!$con) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
?>