<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';

$username=$_SESSION['username'];
$progress = $_POST['progress'];
$progress = (int)$progress;
$pID = $_POST['pID'];
$pID = (int)$pID;
$pName = $_POST['pName'];


if($progress>=0 && $progress<=100 ){
    $sql = "update projects set progress=? where leadUSN=? and pID=? and pName=?";
        
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("dsds",$progress,$username,$pID,$pName);
        try{
            if ($stmt->execute()) {
                header('location:../php/showProjects.php');
            }
        }catch(Exception $e){
            header('location:../php/showProjects.php');
        }
    }
}
header('location:../php/showProjects.php');
?>
