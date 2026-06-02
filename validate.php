<?php

require_once "User.php";

$user = new User();

$message = "";

if (isset($_POST['submit']))
{
    $name       = trim($_POST['name']);
    $age        = $_POST['age'];
    $mobileno   = trim($_POST['mobileno']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];
    $confirmPwd = $_POST['confirm_password'];

    if (empty($name))
    {
        $message = "Name is required";
    }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $name))
    {
        $message = "Name should contain only letters";
    }
    elseif ($age < 18 )
    {
        $message = "18 years old or Above ";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $mobileno))
    {
        $message = "Please enter a valid 10-digit mobile number";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $message = "Please enter a valid email address";
    }
  
    elseif(!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email))
   {
    $message = "Only Gmail addresses are allowed";
   }
    elseif (strlen($password) < 6 )
    {
        $message = "Password must be at least 6 characters";
    }
    elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $message = "Password must contain at least one special character (e.g., !, @, #, $, %).";
        
    }

    if ($message != "")
    {
        echo $message;
    }
    else
    {
        $user->register(
            $name,
            $age,
            $mobileno,
            $email,
            $password
         );

        echo "success";
    }
}
?>

