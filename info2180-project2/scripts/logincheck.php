<?php

session_start();

require_once "./phpfunctions.php";
require_once "./config2.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = " SELECT * FROM Users WHERE email = ? AND password = ? ";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $num_row = mysqli_num_rows($result);
        if($num_row == 1){
            echo "Admin Login Successful.";
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            redirect('./index.php');
        }
        else{
            $_SESSION['message'] = "Error. Incorrect login credentials.";
          
            redirect('./loginpage.php');
        }

}

 ?>
