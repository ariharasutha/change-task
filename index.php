<?php
$message = "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link rel="stylesheet" href="register.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<div class="container">

<div class="left">
    <h1>Get Started</h1>
    <p>Already have an account?</p>
    <a href="login.php" class="btn">Login</a>
</div>

<div class="right">

<h2>Create Account</h2>

<form id="registerForm">

<input type="text"
       id="name"
       name="name"
       placeholder="Full Name"
       autocomplete="name">

<input type="number"
       id="age"
       name="age"
       placeholder="Age"
       autocomplete="bday-year">

<input type="text"
       id="mobileno"
       name="mobileno"
       placeholder="Mobile Number"
       autocomplete="tel">

<input type="email"
       id="email"
       name="email"
       placeholder="Email"
       autocomplete="email">

<input type="password"
       id="password"
       name="password"
       placeholder="Password"
       autocomplete="new-password">

<input type="password"
       id="confirm_password"
       name="confirm_password"
       placeholder="Confirm Password"
       autocomplete="new-password">
<p id="show"></p>

<button type="submit">
Register
</button>

</form>

</div>

</div>

<script>

$(document).ready(function(){

    $("#registerForm").submit(function(e){

        e.preventDefault();

        $.ajax({
            url: "validate.php",
            type: "POST",
            data: {
                submit: true,
                name: $("#name").val(),
                age: $("#age").val(),
                mobileno: $("#mobileno").val(),
                email: $("#email").val(),
                password: $("#password").val(),
                confirm_password: $("#confirm_password").val()
            },
            success: function(response){

                response = response.trim();

                if(response === "success")
                {
                    window.location.href = "login.php";
                }
                else
                {
                    $("#show").html(response);
                    return false;
                }
            }
        });

    });

});

</script>

</body>
</html>