<?php
session_start();

$total = 0;

if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $item)
    {
        $total += $item['price'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
</head>
<body>

<h2>Payment Page</h2>

<p>Total Amount: ₹<?php echo $total; ?></p>

<form action="success.php" method="post">
    <button type="submit">
        Pay Now
    </button>
</form>

</body>
</html>