<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="info2180/scripts/adminlogin.php">
<head>
    <title></title>
    <link rel="stylesheet" type"text/css" href="../styles/adminstyles.css">
    <?php include "bootstrap.php" ?>
</head>
<body>

<?php

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
else{
    $message = "";
}
echo $alert = !empty($message) ? '<div class="alert alert-danger" role="alert">'.$message."</div>" : "";


 ?>

<header>
    <div class="container center-div shadow ">
        <div class="heading text-center mb-5 text-uppercase text-white
        "> ADMIN LOGIN PAGE </div>
        <div class="container row d-flex flex-row
        justify-content-center mb-5">
            <div class="admin-form shadow p-2">
                <form action="logincheck.php" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder= "Please enter your email address." value=""
                        class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder= "Please enter your password." value=""
                        class="form-control" autocomplete="off">
                    </div>
                    <input type="submit" class="btn btn-success" id="submit" value="Login"></>
                </form>
            </div>
        </div>
    </div>
</header>

</body>
</html>
