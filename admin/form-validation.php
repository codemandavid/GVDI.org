<?php 
session_start();
include("pagination5.php");
include("connection.php");

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
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
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

<?php include("sidebar.php")  ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index2.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Blog News</a></div>
    </div>
 <div class="row-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>BLOG NEWS</h5>
      </div>
       </div>
      <div class="row-fluid">
      <div class="span12">
  
    <div class="widget-box">
        <div class="container-fluid">
          <div class="widget-content nopadding">
          <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5></h5>
            <span class="label label-info">News</span> </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
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
                <tr>
                  <th>S/N</th>
                  <th>News Title</th>
                  <th>News Content</th>
                  <th>News image</th>
                  <th>Publish Date</th>
                   <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                $query= "SELECT *  FROM blog_table $limit";
                $run=mysqli_query($conn,$query);
                $counter = 1; 
                
                while ($fetch= mysqli_fetch_array($run) ) {              
                ?>
                <tr>
                 <td><?php echo $counter;?></td>
                  <td><?php  echo $fetch['blog_title']; ?></td>
                  <td><?php  echo $fetch['blog_details']; ?></td>
                  <td><?php  echo $fetch['blog_img']; ?></td>
                  <td><?php  echo $fetch['date']; ?></td>
                   <td><?php
                    $id2=$fetch['id'];
                    echo "<a href='editblog.php?po=$id2' class='btn btn-info'>Edit</a>";
                    ?></td>
                  <td>
                    <?php
                    $id=$fetch['id'];
                    echo "<a href='delete.php?rn=$id' class='btn btn-danger'>Delete</a>";
                    ?>
                  </td>
                 
                  </tr>
                   <?php $counter++; ?>
               
               
                <?php } ?> 
               </tbody>
            </table>
          </div>
          </div>
        </div>
    </div>
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
<div class="row-fluid">
  <div id="footer" class="span12">Copyright © 2019. All right reserved by
                            <a class="color-primary" href="http://damisa.tech/" target="_blank">Damisa Gurus Limited</a></div>
</div>
<!--Footer-part-->

<!--<form method="POST">
      <input type="hidden" name="id" value="<?php //echo $fetch['id'];  ?>">
    <input type="submit" name="delete" value="delete">
    </form>-->


<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_validation.js"></script>
</body>
</html>
