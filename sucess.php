<?php
session_start();

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
<title>Success</title>
</head>
<body>

<h1>✅ Payment Successful</h1>

<p>Your order has been placed successfully.</p>

<a href="welcome.php">
Back To Home
</a>

</body>
</html>