<?php
if(!isset($_SESSION)){session_start();}
require 'config2.php'; 
$username=$_SESSION['username'];

$sql = "select aDate,aTime from `attendance` where usn=?";

if ($stmt = $conn->prepare($sql)) {

    $stmt->bind_param("s",$username);
   
    if ($stmt->execute()) {
        $stmt->store_result();
        
        if ($stmt->num_rows >0) {
            $stmt->bind_result($date, $time);
            echo '<link rel="stylesheet" href="../style/attendance.css">';
            echo '<div id="aBody">';
            while ($stmt->fetch()) {
                echo "<div id='aRow'><h>$date</h> : $time</div>";
            }
            echo '<div>';
        }
    }
} 
?>