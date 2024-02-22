<?php
if(!isset($_SESSION)){session_start();}
date_default_timezone_set('Asia/Calcutta');
require 'config2.php';
$username=$_SESSION['username'];
$date=Date('Y-m-d');
$time=Date('H:i:s');

$sql = "INSERT INTO `attendance`(`usn`, `aDate`, `aTime`) VALUES (?,?,?)";
      
if ($stmt = $conn->prepare($sql)) {
   
    $stmt->bind_param("sss",$username,$date,$time);

    try{
        if ($stmt->execute()) {
            $sql = "UPDATE `members` SET `dayCount`=`dayCount`+1  WHERE usn=?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s",$username);
                try{
                    if($stmt->execute()){

                    }
                }catch(Exception $e){
                    //var_dump($e->getMessage());
                }
            }

        }
    }catch(Exception $e){
        //var_dump($e->getMessage());
    }
   
}
header('location:deMarkAttendance.php');
?>
