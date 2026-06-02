<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SESSION['role']!="admin")
{
    echo "failed";
    exit();
}

require_once "User.php";

$user = new User();

$id = $_GET['id'];

if($id == 1)
{
    echo "admin";
    exit();
}

if($user->deleteUser($id))
{
    echo "success";
}
else
{
    echo "failed";
}
?>