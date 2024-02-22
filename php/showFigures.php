<?php
if(!isset($_SESSION)){session_start();}
require 'config2.php'; 
$username=$_SESSION['username'];

$sql = "select m.usn, m.name, f.role from members m,figures f where m.usn=f.usn";

if ($stmt = $conn->prepare($sql)) {

   
    if ($stmt->execute()) {
        $stmt->store_result();
        
        if ($stmt->num_rows >0) {
            $stmt->bind_result($usn, $name, $role);
            echo '<link rel="stylesheet" href="../style/figures.css">';
            echo "<div display:flex;><br><br>";
            while ($stmt->fetch()) {
                echo "<form action='viewMember.php' method='post'>
                    <input type='hidden' name='usn' value='$usn'>
                    <input type='hidden' name='src' value='f'>
                    <button type='submit' id='btnMemberView'><h>$name</h><br>$role</button></form>";
            }
            echo "</div>";
        }
    }
} 
?>