<?php

require_once "./phpfunctions.php";
session_start();
if(isset($_SESSION['id'])) {
        session_unset();
        session_destroy();
        session_start();
    }

redirect("./loginpage.php");

 ?>
