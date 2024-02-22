<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';

$pID = $_POST['pIdDelete'];
//$pID=(int)$pID;
$pName = $_POST['pNameDelete'];


$sql = "delete from teams where leadUSN in (select leadUSN from projects where pID=? and pName=?)";
if($stmt = $conn->prepare($sql)){
    $stmt->bind_param("ss",$pID,$pName);
    try {if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows >0) {
        }
    }}catch(Exception $e){}
}

$sql = "DELETE FROM projects WHERE pID=? and pName=?";
    
if ($stmt = $conn->prepare($sql)) {

    $stmt->bind_param("ss",$pID, $pName);

    try{
        if ($stmt->execute()) {
        }
    }catch(Exception $e){
    }
}
header('location:../html/projects.html');
?>
