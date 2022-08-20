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
 
        echo   '<h3>Username</h3>';
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

