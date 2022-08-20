<?php 

$host ="localhost";
$user="root";
$password="";
$dbname="tuto";
$conn = mysqli_connect ($host,$user,$password,$dbname);
if(!$conn){


die("the reson:". mysqli_connect_error());


}







?>