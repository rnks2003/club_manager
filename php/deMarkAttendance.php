<?php
if(!isset($_SESSION)){session_start();}
date_default_timezone_set('Asia/Calcutta');

require 'config.php';
$username=$_SESSION['username'];

$sql = "DELETE FROM `attendance` WHERE usn=? and DATEDIFF(NOW(),aDate)>30";
      
if ($stmt = $conn->prepare($sql)) {
   
    $stmt->bind_param("s",$username);

    try{
        if ($stmt->execute()) {
        }
    }catch(Exception $e){
        var_dump($e);
        exit;
    }
}
header('location:../html/attendance.html');
?>
