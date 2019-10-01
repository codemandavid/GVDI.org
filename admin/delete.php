<?php 
session_start();
include("connection.php");

if  (htmlspecialchars(isset($_GET['rn']))){
  $id = $_GET['rn'];

  $checkarticle =  mysqli_query($conn, "SELECT * FROM blog_table WHERE id= '".$id."' ");
  $imagerow = mysqli_fetch_array($checkarticle);
  $image = $imagerow['blog_img'];
  $target_dir ="gallery/";
  $target_file =$target_dir.$image;
  $remove= unlink($target_file);
  if ($remove) {
   $deletearticle = mysqli_query($conn, "DELETE FROM  blog_table WHERE id = '".$id."' ");
  
if ($deletearticle) {
  $_SESSION['update'] = "<p class='alert alert-success'> News was successfully deleted</p>";
  header("Location: form-validation.php");
  exit();

  } else {
  $_SESSION['updatefail'] = "<p class='alert alert-warning'> Input was not deleted</p>";
  header("Location: form-validation.php");
  exit();
  }



  }else{

$_SESSION['updatefail'] = "<p class='alert alert-warning'> Image was not Removed</p>";
header("Location: form-validation.php");
exit();

  }
  
  
  
}

// this section is for deleting images

if (htmlspecialchars(isset($_GET['im']))) {
  $id = $_GET['im'];

  $checkarticle =  mysqli_query($conn, "SELECT * FROM blog_gallery WHERE id= '".$id."' ");
  $imagerow = mysqli_fetch_array($checkarticle);
  $image = $imagerow['image'];
  $target_dir ="gallery/";
  $target_file =$target_dir.$image;
  $remove= unlink($target_file);
  if ($remove) {
   $deletearticle = mysqli_query($conn, "DELETE FROM  blog_gallery WHERE id = '".$id."' ");
  
if ($deletearticle) {
  $_SESSION['update'] = "<p class='alert alert-success'> Image was successfully deleted</p>";
  header("Location: gallery.php");
  exit();

  } else {
  $_SESSION['updatefail'] = "<p class='alert alert-warning'> Input was not deleted</p>";
  header("Location: gallery.php");
  exit();
  }



  }else{

$_SESSION['updatefail'] = "<p class='alert alert-warning'> Image was not Removed</p>";
header("Location: gallery.php");
exit();

  }
  
  
  
}
?>
