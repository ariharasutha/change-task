<?php
session_start();

if(isset($_POST['add']))
{
    $_SESSION['cart'][] = [
        'id'=>$_POST['id'],
        'name'=>$_POST['name'],
        'price'=>$_POST['price']
    ];
}

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
</head>
<body>

<h2>Shopping Cart</h2>

<table border="1" cellpadding="10">
<tr>
<th>Product</th>
<th>Price</th>
</tr>

<?php
if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $item)
    {
        $total += $item['price'];
?>
<tr>
<td><?php echo $item['name']; ?></td>
<td>₹<?php echo $item['price']; ?></td>
</tr>
<?php
    }
}
?>

<tr>
<td><b>Total</b></td>
<td><b>₹<?php echo $total; ?></b></td>
</tr>
</table>

<br>

<a href="payment.php">Proceed To Payment</a>

</body>
</html>