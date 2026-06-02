<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['role']))
{
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != "admin")
{
    die("Access Denied");
}

require_once "User.php";

$user = new User();

$result = $user->getAllUsers();

?>

<head>
    <link rel="stylesheet" href="table.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Users</title>

</head>
<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Mobile</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['mobileno']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>

<button class="edit-btn" onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>'">
    Edit
</button>
<br>
<br>
<button class="delete" data-id="<?php echo $row['id']; ?>">
    Delete
</button>

</td>

</tr>

<?php } ?>

</table>
<button onclick="window.location.href='welcome.php'" class="back-btn">
    ← Dashboard
</button>
<script>

$(document).ready(function(){

    $(".delete").click(function(e){

        e.preventDefault();

        if(!confirm("Do you want to delete this user?"))
        {
            return;
        }

        var userid = $(this).data("id");

        $.ajax({

            url:"delete.php",
            type:"GET",

            data:{
                id:userid
            },

            success:function(response){

                response = response.trim();

                if(response == "admin")
                {
                    alert("Admin account cannot be deleted");
                }
                else if(response == "success")
                {
                    alert("User deleted successfully");
                    location.reload();
                }
                else
                {
                    alert("Unable to delete user");
                    console.log(response);
                }
            }

        });

    });

});

</script>