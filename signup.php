
<?php
session_start();
if(isset($_SESSION['user'])){

  header('location:profile.php');
  exit();
  
  }

if (isset($_POST['submit'])) {
include 'conection.php';
  $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
  $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
  $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);


  $errors=[];
  //validate name
  if(empty($name)){
    $errors[]= "يا بعد روحي خلي اسمك ";
  }elseif(strlen($name)>100){

    $errors[]=" اسمك اطول من حرب ايران يابة خلي اقل من 100 حرف";
  }
//validate email
if(empty($email)){
    $errors[]= " يا وردة خلي بريدك  ";

}elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $errors[]="عيوني بريدك غلط ";
}

$stm= "SELECT email FROM users WHERE email='$email' ";
$q=$conn->prepare($stm);
$q->execute();
$data=$q->fetch();
if ($data){
  $errors[]="حجي هذا البريد موجود جرب غيرة";

}


//validate password
if(empty($password)){
    $errors[]= " يا وردة خلي باسورد  ";

}elseif(strlen($password)<6){

    $errors[]=" ما يصير الباسورد اقل من 6 احرف او ارقام";
  }

  //insert or errors
  if(empty($errors)){
   // echo " inseert db";
   $password=password_hash($password,PASSWORD_DEFAULT);
   $stm="INSERT INTO users (name,email,password) VALUES ('$name','$email', '$password')";
  $q=$conn->prepare($stm)->execute();
  $_POST['name']='';
  $_POST['email']='';
  $_SESSION['user']=[

 "name"=>$name,
 "email"=>$email,

  ];
  header('location:login.php');
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
<h1>هلا بيكم بصفحة  التسجيل بالموقع     </h1>



<div class="login">

<label >Sign up Here</label><br>
<form action="signup.php" method="POST">
  <?php if(isset($errors)){

       if(!empty($errors)){
        foreach($errors as $msg){
      echo $msg . "<br>";

        }
       }


  }  ?>
<input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" id="username" placeholder="name"><br>
<input type="text" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" id="email" placeholder="email"><br>
<input type="password" name="password" id="password" placeholder="password"><br>
<input type="submit" name="submit" id="submit" value="Sign Up">
</form><br>
<!--<button type="submit" name="submit">Sign UP</button> -->
<a href="login.php">الرجوع الى صفحة تسجيل  الدخول</a> <br><br>
</div>

</body>
</html>