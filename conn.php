<?php 

$host="localhost";
$user="root";
$pass="";
$dbname="promotion";

$conn = new mysqli($host,$user,$pass,$dbname);
if($conn->connect_error){
   die( "failed to connect".$conn->connect_error);
}


?>