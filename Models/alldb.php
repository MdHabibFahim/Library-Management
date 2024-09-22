<?php
require_once('db.php');
function auth($id,$pass)
{
	$con=con();
	$sql="select * from user where ID='$id' and Pass='$pass'";
	$res=mysqli_query($con,$sql);
	return $res;
}

function data()
{
	$con=con();
	$sql="select * from user";
	$res=mysqli_query($con,$sql);
	return $res;
}



function showBooks()
{
   $con=con();
   $sql="select * from book";
   $res=mysqli_query($con,$sql);
   return $res;
}

function Fine($id,$Fine)
{
    $con=con();
    $sql="UPDATE book SET fine= '$Fine' WHERE id='$id';";
    $res=mysqli_query($con,$sql);
    return $res ;
}



?>