<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';

$pID = $_POST['pIdDelete'];
$pName = $_POST['pNameDelete'];

var_dump($pID);
var_dump($pName);
exit;

$username = $_SESSION['username'];

$sql = "select leadUSN from projects where pID=? and pName = ?";


if($member!=$username){
    $sql = "DELETE FROM members WHERE usn=?";
      
    if ($stmt = $conn->prepare($sql)) {
    
        $stmt->bind_param("s",$member);

        try{
            if ($stmt->execute()) {
            }
        }catch(Exception $e){
            var_dump($e);
            exit;
        }
    }
}
header('location:../html/members.html');
?>
