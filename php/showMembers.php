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
                echo "<form action='viewMember.php' method='post'>
                    <input type='hidden' name='usn' value='$usn'>
                    <input type='hidden' name='src' value='m'>
                    <button type='submit' id='btnMemberView'><h>$name</h><br>$usn</button></form>";
            }
            echo "</div>";
        }
    }
} 
?>