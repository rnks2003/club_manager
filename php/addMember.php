<?php
if(!isset($_SESSION)){session_start();}

require 'config2.php';

$usn=$_POST["usn"];
$usn = strtoupper($usn);

$name = $_POST['name'];
$branch = $_POST['branch'];
$pn = $_POST['pn'];
$eID = $_POST['emailID'];
$address = $_POST['address'];

//var_dump($usn);
//var_dump($name);
//var_dump($branch);
//var_dump($pn);
//var_dump($eID);
//var_dump($address);
//exit;

$sql = "INSERT INTO `members`(`usn`, `name`, `branch`, `phoneNumber`, `emailID`, `address`, `dayCount`) VALUES (?,?,?,?,?,?,0)";
      
if ($stmt = $conn->prepare($sql)) {
   
    $stmt->bind_param("sssdss",$usn,$name,$branch,$pn,$eID,$address);

    var_dump($stmt);

    try{
        if ($stmt->execute()) {

        }
    }catch(Exception $e){

    }
   
}
header('location:../html/members.html');
?>
