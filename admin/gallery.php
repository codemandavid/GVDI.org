<?php 
session_start();
include("pagination4.php");
include("connection.php");

//logout
if (isset($_SESSION['id']) AND isset($_COOKIE['userid'])) {
  # code...
}else{
  header('Location:login.php');
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
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link rel="shortcut icon" href="gallery/logo.png" />
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
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
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
<?php  include("sidebar.php") ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index2.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sample pages</a> <a href="#" class="current">Gallery</a> </div>
    <h1>Gallery</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Gallery</h5>
            <?php 
              
                
               if (isset( $_SESSION['update'])){
              echo $_SESSION['update'];
               unset( $_SESSION['update']);
              }
             

              if (isset( $_SESSION['updatefail'])){
              echo  $_SESSION['updatefail'];
               unset( $_SESSION['updatefail']);
              
              }
             
    ?>
          </div>
          <div class="widget-content">
             <ul class="thumbnails">
               <?php 
                $query= "SELECT *  FROM blog_gallery $limit";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {              
                ?>

              <li class="span2"> <a> <img style="width:auto; height:160px;" src="gallery/<?php  echo $fetch['image']; ?>" alt="" > </a>
                <div class="actions"> 
                  <?php $id=$fetch['id']; 
                  echo "<a title='' class='' href='delete.php?im=$id'><i class='icon-trash'></i></a>";
                  ?>
                   <a style="width:auto; height:160px;"class="lightbox_trigger" href="gallery/<?php  echo $fetch['image']; ?>"><i class="icon-search"></i></a> </div>
              </li>
                     <?php } ?> 
              </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4"></div>
  <div class="col-md-4">
<ul class="pagination-lg pager " style="display: inline; margin-left: 200px; ">
     <?php echo  $paginationCtrls ; ?>
  </ul>
  </div>
  <div class="col-md-4"></div>
  </div>
</div>

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12">Copyright © 2019. All right reserved by
                            <a class="color-primary" href="http://damisa.tech/" target="_blank">Damisa Gurus Limited</a></div>
</div>
  
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
</body>
</html>
