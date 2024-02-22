<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';
$figure = $_POST["usn"];
$figure = strtoupper($figure);

$username = $_SESSION['username'];

if($figure!=$username){
    $sql = "DELETE FROM figures WHERE usn=?";
      
    if ($stmt = $conn->prepare($sql)) {
    
        $stmt->bind_param("s",$figure);

        try{
            if ($stmt->execute()) {
            }
        }catch(Exception $e){
            var_dump($e);
            exit;
        }
    }
}
header('location:../html/figures.html');
?>
