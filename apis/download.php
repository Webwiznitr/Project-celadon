<?php
session_start();
$certificate=$_SESSION['certificate'];         
    $filepath ="../certificates/".$certificate;
    // echo $file;
    if(file_exists($filepath)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$certificate");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");
        header("Pragma: no-cache"); 
        header("Expires: 0");
        readfile($filepath);
        exit;
        echo json_encode(array('status' => 'success', 'result' => 'Download successful'));
    }else{
        echo json_encode(array('status' => 'error', 'result' => 'Certificate not found'));
    }
?>