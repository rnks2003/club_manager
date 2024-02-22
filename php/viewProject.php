<?php
if(!isset($_SESSION)){session_start();}
require 'config2.php'; 

$username=$_SESSION['username'];

$pID=$_POST['pID'];
$pName=$_POST['pName'];

$sql = "select p.pName, p.pID, p.pDescription, p.leadUSN, p.progress, m.name from projects p,members m where m.usn=p.leadUSN and pID=? and pName=?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ss", $pID,$pName);
    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows==1) {
            $stmt->bind_result($pName, $pID, $pDesc, $leadUSN, $progress, $name);
            echo '<link rel="stylesheet" href="../style/members.css">';
            echo "<div display:flex;><br><br>";
            while ($stmt->fetch()) {
                echo "<button id='btnMemberView'><h>Project ID : </h><br>$pID</button><br /><br />
                    <button id='btnMemberView'><h>Project Name : </h><br>$pName</button><br /><br />
                    <button id='btnMemberView'><h>Project Description : </h><br>$pDesc</button><br /><br />
                    <form method='post' action='viewMember.php'><input type='hidden' name='usn' value='$leadUSN'><input type='hidden' name='pID' value='$pID'>
                    <input type='hidden' name='pName' value='$pName'><input type='hidden' name='src' value='p'><button type='submit' id='btnMemberView'><h>Lead : </h><br>$name($leadUSN)</button></form>";

                $sql = "select t.mUSN, m.name from teams t,members m where t.mUSN = m.usn and t.leadUSN = ? and t.mUSN != t.leadUSN";

                if($stmt = $conn->prepare($sql)){
                    $stmt->bind_param("s",$leadUSN);
                    if($stmt->execute()){
                        $stmt->store_result();

                        if ($stmt->num_rows>=1){
                            $stmt->bind_result($mUSN,$mName);
                            while($stmt->fetch()){
                                echo "<form method='post' action='viewMember.php'><input type='hidden' name='usn' value='$mUSN'><input type='hidden' name='pID' value='$pID'>
                                <input type='hidden' name='pName' value='$pName'><input type='hidden' name='src' value='p'><button id='btnMemberView'><h>Member : </h><br>$mName($mUSN)</button></form>";
                            }
                        }
                    }
                }
                echo "<button id='btnMemberView'><h>Progress : </h><br>$progress</button><br />";
            }
            echo "<br /><form method='post' action='../php/showProjects.php'><button type='submit' id='btnBack'>Back</button></form></div>";
        }
    }
} 

?>