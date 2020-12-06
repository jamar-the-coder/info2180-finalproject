<?php session_start();
require_once "./phpfunctions.php";?>
<!DOCTYPE html>
<html lang="en" dir="info2180/scripts/index.php">

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">

    <script src="./Update.js" type="text/javascript"></script>
</head>

<header>
    <img src="../img/bug-512.png" alt="Code Bug Icon" />
    <h2>BugMe Issue Tracker</h2>
</header>

<div id="option-form">
    <section id="options">
        <div onClick="Home()">
            <img src="../img/home-icon.png" alt="Home Icon" />
            <h3>Home</h3>
        </div>
        <div onClick="addUser(<?php echo $_SESSION["id"]?>)">
            <img src="../img/add-symbol.png" alt="Add User Icon" />
            <h3>Add User</h3>
        </div>
        <div onClick="addIssue()">
            <img src="../img/plusss.png" alt="New Issue Icon" />
            <h3>New Issue</h3>
        </div>
<a href="./logout.php" style="color: black; text-decoration: none;">
        <div>
            <img src="../img/logout.png" alt="Logout Icon" />
            <h3>Logout</h3>
        </div></a>

    </section>
    <section id="data">

    </section>
</div>
