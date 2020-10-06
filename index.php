<?php
if(isset($_POST['firstname'])){
    $font=realpath('Gabriola.ttf');
    $image=imagecreatefromjpeg("images/template_1.jpg");
    $color=imagecolorallocate($image,19,21,22);
    imagettftext($image,50,0,800,600,$color,$font,$_POST['firstname']);
    $file=$_POST['firstname'].time();
    imagejpeg($image,"certificate/".$file.".jpg");
    imagedestroy($image);
    session_start();
    $_SESSION['certi'] = "certificate/".$file.".jpg" ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>certificate generator</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<h3>Certificate generator</h3>

<div class="container">
    <form method="post">
        <label for="fname">Enter Your Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your  first name">
        <input type="submit" value="Generate Certificate ">
        <br>
         <button><a href="">click here to view certificate</a></button>
    </form>
</div>

</body>
</html>
