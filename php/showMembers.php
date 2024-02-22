<?php
if(!isset($_SESSION)){session_start();}
require 'config2.php'; 
$username=$_SESSION['username'];

$sql = "select usn,name from members";

if ($stmt = $conn->prepare($sql)) {

   
    if ($stmt->execute()) {
        $stmt->store_result();
        
        if ($stmt->num_rows >0) {
            $stmt->bind_result($usn, $name);
            echo '<link rel="stylesheet" href="../style/figures.css">';
            echo "<div display:flex;><br><br>";
            while ($stmt->fetch()) {
                echo "<button id='btnMemberView'><h>$name</h><br>$usn</button><br><br>";
            }
            echo "</div>";
        }
    }
} 
?>