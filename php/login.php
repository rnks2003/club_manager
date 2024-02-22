<?php
  if(!isset($_SESSION)){session_start();}

  require_once "config2.php";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $username = strtoupper($username);
  
      $sql = "SELECT username, password FROM login WHERE username = ? ";
      
      if ($stmt = $conn->prepare($sql)) {
          $stmt->bind_param("s", $param_username);
          $param_username = $username;
          
          if ($stmt->execute()) {
              $stmt->store_result();
              if ($stmt->num_rows == 1) {
                  $stmt->bind_result($username, $hashed_password);
                  if ($stmt->fetch()) {
               
                      if ($password==$hashed_password) {
                          $_SESSION["loggedin"] = true;
                          $_SESSION["username"] = $username;
                         
                          // Redirect user to welcome page
                          header("location: ../html/home.html");
                          exit;
                      } else {
                          // Password is incorrect
                          $login_err = "Invalid username or password.";
                      }
                  }
              } else {
                  // Username not found
                  $login_err = "Invalid username or password.";
              }
          } else {
              echo "Oops! Something went wrong. Please try again later.";
          }
  
          $stmt->close();
      }
  }
  header('location:../html/');
  ?>