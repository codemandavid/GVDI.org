<?php 
include('connection.php');

$id=1;
$password="password";

 $hashedpassword = md5(md5($id).$password);

  $query= "UPDATE admin_clwo  SET password ='".$hashedpassword."'  ";

 $runquery= mysqli_query($conn,$query);

 






?>