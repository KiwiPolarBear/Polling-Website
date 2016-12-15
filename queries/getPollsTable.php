<?php

  $host = "mysql.cosc.canterbury.ac.nz";
  $user = "avh17";
  $pass = "99273354";

  $databaseName = "avh17";
  $tableName = "polls";

  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query("SELECT * FROM $tableName");
  $array = mysql_fetch_row($result);
  
  echo json_encode($array);

?>
