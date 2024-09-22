<?php
session_start();
require_once('../Models/alldb.php');


if (empty($_SESSION['id'])) {
    header("location:../Views/login.php");
    exit();
}


$res = showBooks();  

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Library Management - Admin</title>
</head>
<body>

<h1>Library Management - Admin Panel</h1>

<h3>All Borrowing Records</h3>

<table border="1">
    <tr>
       <th>Id</th>
       <th>Book Name</th>
       <th>Borrowing Date</th>
       <th>Return Date</th>
       <th>Fine</th>
    </tr>

    <?php while($r = $res->fetch_assoc()) { ?>
    <tr>
       <td><?php echo $r['id']; ?></td>
       <td><?php echo $r['name']; ?></td>
       <td><?php echo $r['borrowdate']; ?></td>
       <td><?php echo $r['returndate']; ?></td>
       <form method="post">
       <td><button name="Fine" value="<?php echo $r['id'] ?>">Fine</button></td>          
       </form>
    </tr>
    <?php } ?>
</table>

<?php
    if (isset($_POST['Fine'])){
        $id1 = $_POST['Fine'];  
?>
<fieldset>
 <table border="1">
   <tr>
      <th>Id</th>
      <th>Fine</th>
   </tr>
   <form method="post" action="../Controllers/adminController.php">
   <tr>
   <th><input type="text" name="id" value="<?php echo $id1 ?>" readonly></th>
   <th><input type="text" name="Fine" required></th>
   </tr>
   </table>
   <button name="Save1">Save</button>
   </form>
   
</fieldset>
<?php } ?>


<form method="post" action="../Controllers/loginCheckController.php">

<button name="logout">logout</button>
</form>



</body>
</html>
