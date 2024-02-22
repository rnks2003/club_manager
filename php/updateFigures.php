<?php
    if(!isset($_SESSION)){session_start();}
    require_once "config2.php";
    $username = $_SESSION['username'];

    $sql = "select usn from figures where usn=?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;
        
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                header('location:../html/updateFigures.html');
            }
            else{
            }
        }
    }
    header('location:../html/figures.html');
?>