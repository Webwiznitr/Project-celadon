
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

// Upload Signature
if(isset($_FILES['Signature'])){
  echo "alert('Working!')";
  $errors= array();
  $file_name = $_FILES['Signature']['name'];
  $file_size =$_FILES['Signature']['size'];
  $file_tmp =$_FILES['Signature']['tmp_name'];
  $file_type=$_FILES['Signature']['type'];
  $tmp = explode('.',$_FILES['Signature']['name']);
  $file_ext=strtolower(end($tmp));
  
  $extensions= array("jpeg","jpg","png");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if($file_size > 2097152){
     $errors[]='File size must be exactely 2 MB';
  }
  
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"../uploads/".$file_name);
     echo "Success";
  }else{
     print_r($errors);
  }

  $redirectUrl = '../index.html';
   echo '<script type="application/javascript">alert("Upload SUccessful!."); window.location.href = "'.$redirectUrl.'";</script>';
}


?> 