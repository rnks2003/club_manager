<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';

$username=$_POST["username"];
$username = strtoupper($username);
$role = $_POST["role"];

$role = $_POST["role"];

$sql = "INSERT INTO `figures`(`usn`, `role`) VALUES (?,?)";
      
if ($stmt = $conn->prepare($sql)) {
   
    $stmt->bind_param("ss",$username,$role);

    try{
        if ($stmt->execute()) {

        }
    }catch(Exception $e){

    }
   
}
header('location:../html/figures.html');
?>
