 
<?php
session_start();
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
   <br><br><br>
<h1>يا مية هلا وسهلا بيكم    </h1>
<h3>يلا  شمنتظر سجل</h3>
<h4> ! وانشر الي يعجبك هسة وخلي العالم تعرف ابداعك</h4>
<div class="home">
    <?php 
    if(isset($_SESSION['user'])){
        
         ?>

    <a href="profile.php" class="a">Your profile</a> <br> 
    

     <?php


    }else{
         ?>
        <a href="login.php" class="a">   تسجيل الدخول</a> <br><br><br>
        <a href="signup.php" class="a" >  التسجيل في الموقع </a> <br><br>
        <?php
    }
    
    ?>


</div>

</body>
</html>