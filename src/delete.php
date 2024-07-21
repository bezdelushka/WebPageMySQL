<?php
require_once "connect.php";
 
 $sql="DELETE FROM Img WHERE id='{$_GET['id']}'";
 $query=  mysqli_query($con, $sql)or die(mysqli_error($con));
 header('Location:index.php');