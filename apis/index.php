
<?php
session_start();
echo isset($_FILES['file']['name']);
if (isset($_POST['name']) && isset($_POST['event']) && isset($_POST['date']) &&isset($_POST['template'])) {
    // echo 'yes';
    $font = realpath('../Gabriola.ttf');
    $template = $_POST['template'];
    $image = imagecreatefromjpeg("../template/".$template);
    $color = imagecolorallocate($image, 19, 21, 22);
    $srcImage = $_POST['sign'];
    //signature resizing
    $signature=imagecreatefromjpeg("../uploads/".$srcImage);  
    $width = imagesx($signature);  
    $height = imagesy($signature);
    $targetHeight = 140;
    $targetWidth = 300;
    $targetImage = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetImage, $signature, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
    $size = getimagesize("../template/".$template);  
    //position in template to place sign
    $dest_x =round($size[0]) - 400;  
    $dest_y =round($size[1]) - 300;  
    imagettftext($image, 50, 0, 800, 600, $color, $font, $_POST['name']);
    imagettftext($image, 50, 0, 800, 900, $color, $font, $_POST['event']);
    imagettftext($image, 50, 0, 1200, 900, $color, $font, $_POST['date']);
    //merge signature
    imagecopy($image, $targetImage, $dest_x , $dest_y, 0, 0, $targetWidth, $targetHeight);
    $name = trim($_POST['name']);
    $event = trim($_POST['event']);

    $file = $name."_".$event;
    imagejpeg($image, "../certificates/" . $file . ".jpg");
    imagedestroy($image);
    $_SESSION['certificate'] = "../certificates/" . $file . ".jpg";
    if(isset($_SESSION['certificate'])){
        echo(json_encode(array('status'=>'success','message' => $file)));
    }
}
 


?> 