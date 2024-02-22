<?php
if(!isset($_SESSION)){session_start();}
require 'config.php';

$pID=$_POST["pID"];
$pName = $_POST["pName"];
$pDesc = $_POST["pD"];
$leadUSN = $_POST["leadUSN"];
$leadUSN = strtoupper($leadUSN);

$sql = "insert into projects values(?,?,?,?,0)";
      
if ($stmt = $conn->prepare($sql)) {
   
    $stmt->bind_param("ssss", $pName, $pID, $pDesc, $leadUSN);

    try{
        if ($stmt->execute()) {
        }
    }catch(Exception $e){

    }
}
header('location:../html/projects.html');
?>
