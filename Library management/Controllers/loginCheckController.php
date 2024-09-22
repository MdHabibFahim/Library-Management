<?php
require_once('../Models/alldb.php');
session_start();
$id=$_POST['id'];
$pass=$_POST['pass'];

if(empty($id || $pass))
{
   $_SESSION['error']="Please fill up the form";
   header("location:../Views/login.php");
}

else
{

	$status=auth($id,$pass);

    if (mysqli_num_rows($status) == 1) {
        $_SESSION['id'] = $id;

        if ($id == '1' && $pass == '1') {
            header("location:../Views/admin.php");
        } else {
            header("location:../Views/home.php");
        }

        exit();
    }

	else
	{
		$_SESSION['error']="Invalid User";
		header("location:../Views/login.php");
	}
}

if(isset($_GET['logout']))
{
	unset($_SESSION['id']);
	header("location:../Views/login.php");
}

?>