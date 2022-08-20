
<?php
session_start();
if(isset($_SESSION['user'])){

  header('location:profile.php');
  exit();
  
  }
if (isset($_POST['submit'])) {
include 'conection.php';
  
  $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
  $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);


  $errors=[];
  
//validate email
if(empty($email)){
    $errors[]= " يا وردة خلي بريدك  ";

}




//validate password
if(empty($password)){
    $errors[]= " يا وردة خلي باسورد  ";

}

  //insert or errors
  if(empty($errors)){
   // echo " check db";

$stm= "SELECT * FROM users WHERE email='$email' ";
$q=$conn->prepare($stm);
$q->execute();
$data=$q->fetch();
if(!$data){

   $errors[]="يا وردة تاكد من معلوماتك اكو خطا";
}else{

$password_hash=$data['password'];
if (!password_verify($password,$password_hash)){
  $errors[]="يا وردة تاكد من معلوماتك اكو خطا";


}else{
    $_SESSION['user']=[

        "name"=>$data['name'],
        "email"=>$email,
       
         ];
    header('location:profile.php');
}
}
   
 // header('location:profile.php');
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeaceTok</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<br><br>
<h1>هلا بيكم بصفحة تسجيل الدخول     </h1>

<div class="login">
<label for="password">Login Here</label><br>
<form action="login.php" method="POST">
<?php if(isset($errors)){

if(!empty($errors)){
 foreach($errors as $msg){
echo $msg . "<br>";

 }
}


}  ?>
<input type="text" name="email" id="email" placeholder="Email"><br>
<input type="password" name="password" id="password" placeholder="Password"><br>
<input type="submit" name="submit" id="submit" value="Login">


</form><br>
<!--<button type="submit" name="submit">Sign UP</button> -->
<a href="signup.php">الانتقال الى صفحة التسجيل</a> <br><br>
</div>

</body>
</html>