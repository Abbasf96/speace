<?php

session_start();
if(!isset($_SESSION['user'])){

header('location:index.php');
exit();

}
include('conection.php');
include('config.php');
$subject='';
$title='';

if(isset($_POST['subject'])){

$subject = $_POST['subject'];


}
if(isset($_POST['title'])){

    $title = $_POST['title'];
    }

if(isset($_POST['btn-upload'])){

$maxsize = 5242880; //5Mb
$name = $_FILES['file']['name'];
$target_dir = "videos/";
$target_file =$target_dir . $_FILES['file']['name'];
$videoFileType= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$extention_arr= array("mp4", "mpeg", "avi", "3gp","mov");
if(in_array($videoFileType,$extention_arr)){
 if(($_FILES['file']['size'] >= $maxsize) || ($_FILES['file']['size']==0)){
 echo "<center><h3 class='faild'> حبيبي الحجم جبير جرب واحد اصغر من 5ميجا</h3></center>";

 }else{

if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)) {
  $query = "INSERT INTO vid (name,loc,subject,title) VALUES ('".$name."','".$target_file."', '$subject', '$title')";
  mysqli_query($conn,$query);
  echo "<center><h3 class='suc'> كفوو الفيديو انرفع يا وردة</h3></center>";
}

 }

}else{


echo "<center><h3 class='faild'>يحبيبي دخل فيديو</h3></center>";

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="upload.css">

</head>
<body>
<div class="container">

<center>

<img src="images/logo.png" >



</center>

<div class="form">

<form  method="post" enctype="multipart/form-data">
<input type="file" name="file" >
<br>
<input type="text" name="subject" id="subject" placeholder="اكتب عنوان الفيديو">
<br>
<input type="text" name="title" id="title" placeholder="وصف مختصر عن الفيديو">
<br>
<input type="submit" value="رفــع الفيديو" name="btn-upload"><br>
<a href="http://localhost/speacetok/profile.php" class="linko">رجوع لصفحة العرض</a>


</form>

</div>


</div>


</body>
</html>