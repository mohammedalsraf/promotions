<?php 

include("conn.php");
if($_SERVER['REQUEST_METHOD']==='GET'){
if(isset($_GET["id"])){
    $id=$_GET['id'];
$sql="DELETE FROM `emp` WHERE id=$id";
$res=$conn->query($sql);
 if(!$res){
    die( "SQL Fail".mysqli_error($conn));
 }
 $deleteMsg='test';
 header("location: searchupdate.php");



}


}







?>