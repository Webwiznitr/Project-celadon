<?php
session_start();
$certificate=$_SESSION['certificate'];         
    $filepath ="../certificates/".$certificate;
    // echo $file;
    if(file_exists($filepath)) {
        echo json_encode(array('status' => 'success', 'result' => $certificate));
    }else{
        echo json_encode(array('status' => 'error', 'result' => 'Certificate not found'));
    }
?>