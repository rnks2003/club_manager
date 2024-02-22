<?php
if(!isset($_SESSION)){session_start();}
require 'config.php'; 
$username=$_SESSION['username'];

$sql = "select p.pID, p.pName, m.name from projects p, members m where m.usn=p.leadUSN";

if ($stmt = $conn->prepare($sql)) {

   
    if ($stmt->execute()) {
        $stmt->store_result();
        
        if ($stmt->num_rows >0) {
            $stmt->bind_result($pID, $pName,$leadName);
            echo '<link rel="stylesheet" href="../style/projects.css">';
            echo "<div display:flex;><br><br>";
            while ($stmt->fetch()) {
                echo "<form action='../php/viewProject.php' method='post'>
                <input type='hidden' name='pID' value='$pID'>
                <input type='hidden' name='pName' value='$pName'>
                <button type='submit' id='btnProjectView'>ID : $pID<br><h>$pName</h><br> lead by : $leadName</button></form>";
            }
            echo "</div>";
        }
    }
} 
?>