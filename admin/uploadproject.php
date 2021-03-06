<?php
session_start();
include("connection.php");
if (isset($_SESSION['id']) AND isset($_COOKIE['userid'])) {
  # code...
}else{
  header('Location:login.php');
}

$error="";
if (array_key_exists("submit",$_POST)) {

    if (!$_FILES['image']['name']) {
    $error.="Project Image required<br>";
    
}
if (!$_POST['title']) {
    $error.="A Project title Title is required <br>";
    
}
if (!$_POST['details']) {
    $error.="Project Details is required <br>";
    
}

if ($error !="") {
    $error = "Incomplete Input<br>".$error;
}else{


 $target_dir = "gallery/";
 $target_file = $target_dir.basename($_FILES["image"]["name"]); 
 $uploadok=1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;   
    } else {
        $error= "File is not an image.";
          $uploadOk = 0;
    }
    //check file size
     if ($_FILES["image"]["size"] > 5000000) {
    $error="Sorry, your file is too large.File should not be more than 5mb.";
      $uploadOk = 0;
  
 }
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
     $error="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;

  }

  if ($uploadOk == 0) {
    $error="Sorry, your file was not uploaded.".$error;
 // if everything is ok, try to upload file
 }  else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image=basename($_FILES["image"]["name"]);

        $title=$_POST['title'];
        $details=$_POST['details'];
        $date=date('d M Y');

   $sql = "INSERT INTO project_table (proj_title,proj_details,proj_img, date)
VALUES ('$title', '$details', '$image' ,'$date')";
    
    if (mysqli_query($conn, $sql)) {
    $success= "You have successfully created Your Project ";
} else {
    $error="There was a Problem uploading Your FIle<br>".mysqli_error($conn);
}     
} else {
        $error= "Sorry, there was an error uploading your file.";
    }
 }
 
}   





}





 ?>





<!DOCTYPE html>
<html lang="en">
<head>
<title>GVDI || ADMIN</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
 <link rel="shortcut icon" href="gallery/logo.png" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="index2.php">GVDI || ADMIN</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important"></span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="Outbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->
<?php include("sidebar.php"); ?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index2.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"></a> <a href="#" class="current"></a> </div>
  
</div>

  <div class="row-fluid">
    <div class="widget-box">
      <?php if ($error !=""){
    echo "<p class='alert alert-danger alert-dismissable'>$error</p>";
    }

if (isset($success)) {
  echo "<p class='alert alert-success alert-dismissable'>$success</p>";
}
    ?>
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>PROJECTS</h5>

        

      </div>
      <div class="widget-content">
         <form method="post" enctype="multipart/form-data">
        <div class="control-group">
      
              <label class="control-label">Image Upload</label>
              <div class="controls">
                <input type="file" name="image">
              </div>

            </div>
          <div class="control-group">
              <label class="control-label">News Title:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Project Title" name="title" />
              </div>
            </div>
         
            <div class="controls">
              <label class="control-label">News Details</label>
              <textarea class="textarea_editor span12" rows="6" placeholder=" Project Details ..." name="details"></textarea>
            </div>
             
              <button type="submit" class="btn btn-success" name="submit">Submit</button>
            
          </form>
        </div>
      <div class="row-fluid">
      <div class="span12">
  
    
</div>
</div>
  </div>
</div>
</div>
    
  

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy;Brought to you by <a href="">Davidchijioke11@gmail.com</a> </div>
</div>
<!--end-Footer-part--> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
