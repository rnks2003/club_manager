<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';

$pID = $_POST['pIdDelete'];
$pName = $_POST['pNameDelete'];

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
