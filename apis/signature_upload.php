<?php 
session_start();
if (isset($_FILES["file"]["name"])) {
    $extension = array('jpg', 'jpeg');
    $errors = array();
    $path = "../uploads/";
    $uploadThisFile = true;
    $file_name=$_FILES["file"]["name"];
    $file_tmp=$_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(!in_array(strtolower($ext),$extension))
    {
        array_push($errors, "File type is invalid. Name:- ".$file_name);
        $uploadThisFile = false;
    }     
    if($file_size > 2097152){
        $errors[]='File size must be less than 2 MB';
        $uploadThisFile = false;
    }           
    if($uploadThisFile){
        move_uploaded_file($_FILES["file"]["tmp_name"],$path.$file_name);
        if(file_exists($path.$file_name)){
            echo(json_encode(array('status' => 'success', 'result' => $file_name)));
        }	
	}else{
		echo(json_encode(array('status' => 'error', 'result' => "The files should be jpeg/jpg. Problem while uploading")));
	}
                    
}
else
{
    echo(json_encode(array('status'=>'error','result' => 'No file selected'))); 
}
?> 