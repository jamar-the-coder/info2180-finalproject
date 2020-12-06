<?php
session_start();
require_once "phpfunctions.php";
require_once "config2.php";

$insert_mysqli = "INSERT INTO Users(firstname, lastname, password, email, date_joined) VALUES (?, ?, ?, ?, ?) ";
$insert_mysqli_stmt = mysqli_prepare($con,$insert_mysqli);


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password= $_POST["password"];
    $email = $_POST["email"];
    date_default_timezone_set("America/Jamaica");
    $date_joined = date_format( new DateTime(),"Y-m-d H:i:s");
    $valid_name = "/^[A-Z][a-z]+$/";
    $valid_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    $flag = true;

    if ($firstname === "" || $lastname === "" || $password === "" || $email === ""){
            $flag = false;
            setMessage("Please fill any field that you left empty.");
        }
    else if((is_numeric($firstname) || is_numeric($lastname) || is_numeric($password) || is_numeric($email))){
        $flag = false;
        setMessage("Error. Fields contain unaccepable values.");
    }
    else if(!preg_match($valid_name,$firstname)){
        $flag = false;
        setMessage("Error. First Name field has unacceptable values.");
    }
    else if(!preg_match($valid_name,$lastname)){
        $flag = false;
        setMessage("Error. Last Name field has unacceptable values.");
    }
    else if(!preg_match($valid_password,$password)){
        $flag = false;
        setMessage("Error. Password field has unacceptable values.");
    }

    if($flag){
        $x = 'sssss';
        $password = md5($password);
        mysqli_stmt_bind_param($insert_mysqli_stmt, $x, $firstname, $lastname, $password, $email, $date_joined);
        if(mysqli_stmt_execute($insert_mysqli_stmt))
            setMessage("New user has been successfully added.");
        else
          setMessage("Email address already in use.");  
    }
    echo $_SESSION["message"];

}
 ?>
