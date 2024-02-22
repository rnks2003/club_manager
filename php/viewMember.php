<?php
if(!isset($_SESSION)){session_start();}
require 'config.php'; 

$username=$_SESSION['username'];

$usn=$_POST['usn'];
$src = $_POST['src'];

$sql = "select * from members where usn=?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $usn);
    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows==1) {
            $stmt->bind_result($usn, $name, $branch, $phoneNumber, $emailID, $address, $dayCount);
            echo '<link rel="stylesheet" href="../style/members.css">';
            echo "<div display:flex;><br><br>";
            while ($stmt->fetch()) {
                echo "<button id='btnMemberView'><h>USN : </h><br>$usn</button><br /><br />
                    <button id='btnMemberView'><h>Name : </h><br>$name</button><br /><br />
                    <button id='btnMemberView'><h>Phone Number : </h><br>$phoneNumber</button><br /><br />
                    <button id='btnMemberView'><h>Email ID : </h><br>$emailID</button><br /><br />
                    <button id='btnMemberView'><h>Branch : </h><br>$branch</button><br /><br />
                    <button id='btnMemberView'><h>Address : </h><br>$address</button><br />";
            }
            if($src=='f'){
                echo "<br /><form method='post' action='../php/showFigures.php'><button type='submit' id='btnBack'>Back</button></form></div>";
            }else if($src=='m'){
                echo "<br /><form method='post' action='../php/showMembers.php'><button type='submit' id='btnBack'>Back</button></form></div>";
            }else if($src=='p'){
                $pID = $_POST['pID'];
                $pName = $_POST['pName'];
                echo "<br /><form method='post' action='../php/viewProject.php'><input type='hidden' name='pID' value='$pID'>
                <input type='hidden' name='pName' value='$pName'><button type='submit' id='btnBack'>Back</button></form></div>";
            }
        }
    }
} 

?>