<?php
session_start();
require_once('../Models/alldb.php');
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $status=delete($id);
    if($status)
    {
        $_SESSION['mes']="Deleted";
        header("location:../Views/home.php");
    }
}
 
if(isset($_POST['Save1'])){
    $id1=$_POST['id'];
    $Fine=$_POST['Fine'];
    if(empty($Fine)){
        $_SESSION['mes']="Insert fine amount correctly";
        header("location:../Views/home.php");
    }
    else{
        $status=Fine($id1,$Fine);
    if($status)
    {
        header("location:../Views/home.php");
        $_SESSION['mes']="Fine added Successfully";
 
    }
    }
}
 
?>
 