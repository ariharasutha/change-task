<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}

$products = [
    ["id"=>1,"name"=>"Laptop","price"=>50000],
    ["id"=>2,"name"=>"Mobile","price"=>20000],
    ["id"=>3,"name"=>"Headphones","price"=>3000]
];
?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="welcome.css">
<style>
.product{
    border:1px solid #ccc;
    padding:15px;
    margin:10px;
    width:200px;
    display:inline-block;
    text-align:center;
}
</style>
</head>
<body>

<div class="container">

<h1>Welcome <?php echo $_SESSION['user']; ?></h1>

<h2>Products</h2>

<?php foreach($products as $p){ ?>
<div class="product">
    <h3><?php echo $p['name']; ?></h3>
    <p>₹<?php echo $p['price']; ?></p>

    <form action="cart.php" method="post">
        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
        <input type="hidden" name="name" value="<?php echo $p['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $p['price']; ?>">
        <button type="submit" name="add">Add To Cart</button>
    </form>
</div>
<?php } ?>

<br><br>

<a href="cart.php">View Cart</a>

<br><br>

<a href="logout.php" class="btn logout">Logout</a>

</div>

</body>
</html>