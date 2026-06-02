<?php

require_once "User.php";
session_start();

if($_SESSION['role'] != "admin")
{
    die("Access Denied");
}

$user = new User();

$id = $_GET['id'];

$row = $user->getUserById($id);

if(isset($_POST['update']))
{
if(isset($_POST['update']))
{
    $message = "";

    $name = trim($_POST['name']);
    $age = (int)$_POST['age'];
    $mobileno = trim($_POST['mobileno']);
    $email = trim($_POST['email']);

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
        $message = "Age must be above 18 ";
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

    if($message != "")
    {
         $message;
    }
    else
    {
        $user->updateUser(
            $id,
            $name,
            $age,
            $mobileno,
            $email
        );

        header("Location:view.php");
        exit();
    }
}
}
?>
 <link rel="stylesheet" href="edit.css">
<div class="container">
<form method="POST">
    <p class="error">
    <?php
    if(isset($message))
    {
        echo $message;
    }
    ?>
</p>

<input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

<input type="number" name="age" value="<?php echo $row['age']; ?>"><br><br>

<input type="text" name="mobileno" value="<?php echo $row['mobileno']; ?>"><br><br>

<input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

<button type="submit" name="update">Update</button>

</form>
</div>