<?php
session_start();
require_once "User.php";

$error="";

if(isset($_POST['login']))
{
    $user = new User();

    $result = $user->login(
        $_POST['email'],
        $_POST['password']
    );

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();

        $_SESSION['id']   = $row['id'];
        $_SESSION['user'] = $row['name'];
        $_SESSION['role'] = $row['role'];

        header("Location: welcome.php");
        exit();
    }
    else
    {
        $error="Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css">
</head>

<body>

<div class="login-container">

    <div class="left">

        <h1>Get Started</h1>

        <p>Don't have an account yet? Register.</p>

        <a href="index.php" class="btn">
            register
        </a>

    </div>

    <div class="right">

        <form method="POST">

            <h2>Login</h2>

            <input
            type="email"
            name="email"
            placeholder="Email" autocomplete="off"
            required >

            <input
            type="password"
            name="password"
            placeholder="Password" autocomplete="new-password"
            required>

            <button
            type="submit"
            name="login">
            Login
            </button>

            <p class="error">
                <?php echo $error; ?>
            </p>

            <a href="index.php" class="register-link">
                New User ? Register
            </a>

        </form>

    </div>

</div>

</body>
</html>