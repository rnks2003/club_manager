<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';

$member = $_POST["usn"];
$member = strtoupper($member);

$username = $_SESSION['username'];

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
