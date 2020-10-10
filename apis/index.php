<?php
if (isset($_POST['name']) && isset($_POST['event']) && isset($_POST['date']) && isset($_POST['template']) && isset($_POST["signature"])  ) {
    // echo 'yes';
    $font = realpath('../Gabriola.ttf');
    $template = $_POST['template'];
    $image = imagecreatefromjpeg("../template/".$template);
    $color = imagecolorallocate($image, 19, 21, 22);
    imagettftext($image, 50, 0, 800, 600, $color, $font, $_POST['name']);
    imagettftext($image, 50, 0, 600, 900, $color, $font, $_POST['event']);
    imagettftext($image, 50, 0, 1200, 900, $color, $font, $_POST['date']);
    imagettftext($image, 50, 0, 900, 1050, $color, $font, $_POST['signature']);
    $file = $_POST['name']."_".$_POST['event']."_".$_POST['date'];
    imagejpeg($image, "../certificates/" . $file . ".jpg");
    imagedestroy($image);
    session_start();
    $_SESSION['certificate'] = "../certificates/" . $file . ".jpg";
    if(isset($_SESSION['certificate'])){
        echo(json_encode(array('status'=>'success','message' => $file)));
    }
}
// if (isset($_POST['generate'])) {
    
//       $name = strtoupper($_POST['name']);
//       //template for certificate
//       $template = $_POST['template'];
//         echo $template;
//       $createimage = imagecreatefrompng($image);

//       //this is going to be created once the generate button is clicked
//       $output = "certificate.png";
//       $black = imagecolorallocate($createimage, 0, 0, 0);

//       //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
//       $rotation = 0;

//       //we then set the x and y axis to fix the position of our text name
//       $origin_x = 800;
//       $origin_y=600;
//       $font_size = 50;
      
//       $certificate_text = $name;

//       //font directory for name
//       $drFont = "Gabriola.ttf";

//       //function to display name on certificate picture
//       $textname = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);
//       $textevent = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);
//       $textdate = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);

//       imagepng($createimage,$output,3);
// }

?> 