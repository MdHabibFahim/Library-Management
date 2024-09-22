<?php
require_once('../Models/alldb.php');
session_start();
if(empty($_SESSION['id']))
{
   header("location:login.php");
}
    $res = showBooks(); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Book List</title>
</head>
<body>

<h3>Student Borrow Books Details</h3>

<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Borrow Date</th>
<th>Return Date</th>
<th>Fine</th>
</tr>

<?php while ($r = $res->fetch_assoc()) { ?>
<tr>
<td><?php echo $r['id']; ?></td>
<td><?php echo $r['name']; ?></td>
<td><?php echo $r['borrowdate']; ?></td>
<td><?php echo $r['returndate']; ?></td>
<td><?php echo $r['fine']; ?></td>



</tr>
<?php } ?>
</table> 

<form method="post" action="../Controllers/loginCheckController.php">



<button name="logout">logout</button>
</form>

</body>
</html>
