<?php
if(!isset($_SESSION)){session_start();}

require 'config.php';
$username = $_SESSION['username'];
$mUSN = $_POST['mUSN'];

$sql = "select pID,pName,leadUSN from projects where leadUSN=?";
      
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s",$username);

    try{
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($pID,$pName,$leadUSN);

                if($stmt->fetch()){
                    if($username==$leadUSN){
                        $sql = "insert into teams values(?,?)";
                            
                        if ($stmt = $conn->prepare($sql)) {
                            $stmt->bind_param("ss", $mUSN, $leadUSN);
                        
                            try{
                                if ($stmt->execute()) {
                                    header('location:../php/showProjects.php');
                                }
                            }catch(Exception $e){
                            }
                        }
                    }
                }
            }
        }
    }catch(Exception $e){
    }
}
header('location:../php/showProjects.php');
?>
