<?php
if(!isset($_SESSION)){session_start();}
require 'config2.php'; 
$username=$_SESSION['username'];

$sql = "select m.name, f.role from members m,figures f where m.usn=f.usn";

if ($stmt = $conn->prepare($sql)) {

   
    if ($stmt->execute()) {
        $stmt->store_result();
        
        if ($stmt->num_rows >0) {
            $stmt->bind_result($name, $role);
            echo '<link rel="stylesheet" href="../style/figures.css">';
            echo "<div display:flex;><br><br>";
            while ($stmt->fetch()) {
                echo "<button id='btnMemberView'><h>$name</h><br>$role</button><br><br>";
            }
            echo "</div>";
        }
    }
} 
?>