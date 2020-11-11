<?php
if (isset($_POST['name']) && isset($_POST['event']) && isset($_POST['date']) &&isset($_POST['template'])) {
    // echo 'yes';
    $font = realpath('../Gabriola.ttf');
    $template = $_POST['template'];
    $image = imagecreatefromjpeg("../template/".$template);
    $color = imagecolorallocate($image, 19, 21, 22);
    imagettftext($image, 50, 0, 800, 600, $color, $font, $_POST['name']);
    imagettftext($image, 50, 0, 800, 900, $color, $font, $_POST['event']);
    imagettftext($image, 50, 0, 1200, 900, $color, $font, $_POST['date']);
    $file = $_POST['name']."_".$_POST['event']."_".$_POST['date'];
    imagejpeg($image, "../certificates/" . $file . ".jpg");
    imagedestroy($image);
    session_start();
    $_SESSION['certificate'] = "../certificates/" . $file . ".jpg";
    if(isset($_SESSION['certificate'])){
        echo(json_encode(array('status'=>'success','message' => $file)));
    }
}


?> 