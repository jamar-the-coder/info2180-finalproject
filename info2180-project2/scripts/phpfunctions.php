<?php

function redirect(string $url)
{
    header("Location:".$url);
    exit;
}

function setMessage(string $msg)
{
    $_SESSION['message'] = $msg;
}

function dump($arg)
{
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

 ?>
