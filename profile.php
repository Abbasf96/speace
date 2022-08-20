<?php

session_start();
if(!isset($_SESSION['user'])){

header('location:index.php');
exit();

}
include('config.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profle</title>
    <link rel="stylesheet" href="video.css">

</head>
<body>
<header style="display:flex;  justify-content: space-between; align-items:center; background-color: #24252A;  padding:20px 10%; width: 100%;">

<img class="logo" style=" cursor: pointer" src="images/logo1.png" alt=logo>
<nav>
<ul class="nav_links" style="text-decoration:none; list-style:none;display:inline-block; padding:0px 20px;transition: all 0.3s ease 0s">
    <li style="text-decoration:none; display:inline-block; padding:0px 20px;transition: all 0.3s ease 0s">EMAIL:<p style="color:red;"><?php echo $_SESSION['user']['email'] ;?></p></li>
    <li style="text-decoration:none;display:inline-block; padding:0px 20px;transition: all 0.3s ease 0s"> NAME: <p style="color:red;"><?php echo $_SESSION['user']['name'] ;?></p> </li>
    <!--<li style="text-decoration:none;display:inline-block; padding:0px 20px;"><a href="#" style="text-decoration:none;">ABOUT</a></li>-->

</ul>

</nav>

 <a href="logout.php" class="cta" style="text-decoration:none;transition: all 0.3s ease 0s"><button style="background-color: rgba(0,136,169,1); font-size:16px; padding:9px 25px;border:none;border-radius:50px;cursor: pointer;transition: all 0.3s ease 0s; button:hover:color:red;">LOGOUT</button></a>
</header>

    <div class="app-vedio">
         <?php

$fetchAllVidoes=mysqli_query($conn,"SELECT * FROM vid ORDER BY id DESC ");

while ($row= mysqli_fetch_assoc($fetchAllVidoes)) {
   
    $loc      =$row['loc'];
    $subject  =$row['subject'];
    $title    =$row['title'];
    
 echo  ' <div class="vedio">';

 echo  '  <video src="'.$loc.'" class="vedio-player"></video>';
        

 echo  '  <div class="footer">';

    echo  ' <div class="footer-text">';
    echo  '<h3>'.$_SESSION['user']['name'].'</h3>';
    echo  ' <p class="descrption">'.$subject. '</p>';
    echo  ' <div class="img-marq">';
    echo  ' <a href="http://localhost/speacetok/upload.php"><img src="images/up.png"></a>';
    echo  '  <marquee >'.$title.'</marquee>';

    echo  '  </div>';
    echo  '   </div> '; 
     
    echo  ' <img src="images/share.png" class="img1-play" >';
    echo  '  <img src="images/play.png" class="img-play" > ';
    echo  '  <img src="images/heart.png" class="img2-play" > ';
    echo  '</div>';


        
    echo  ' </div>';
    

}
    ?>
    </div>
    


    <script>

   const vedios = document.querySelectorAll('video');
   for(const video of vedios ){

video.addEventListener('click', function(){


if(video.paused){


    video.play();
}else{
    video.pause();
}



})








   }


    </script>
</body>
</html>

