<?php
include "Connection.php";
if(isset($_GET['id'])){
   $id=$_GET['id'];
   $sql="delete from crud where id= $id" ;
   $result=mysqli_query($conn,$sql);
}

header('location:/CRUD_PHP/index.php');
exit;


?>
