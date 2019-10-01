<?php 
session_start();
//include("pagination3.php");

//logout
if (isset($_SESSION['id']) AND isset($_COOKIE['userid'])) {
  # code...
}else{
  header('Location:login.php');
}



/*$error="";
if (isset($_POST['delete'])) {
  $id=$_POST["id"];
  $sql= " DELETE FROM volunteer_table WHERE id='".$id."'  ";
  $query= mysqli_query($conn,$sql);
      if ($query) {
        $error= "Member deleted successfully";
      }else{
        $error="Error Deleting Member " . mysqli_error($conn);
}
      }*/
  


  

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>GVDI || ADMIN</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="shortcut icon" href="gallery/logo.png" />
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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


<div id="content" class="widget-box">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index2.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="index2.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
      <li class="bg_lg"> <a href="form-common.php"> <i class="icon-shopping-cart"></i>Blog News</a> </li>
      <li class="bg_ly"> <a href="gallery.php"> <i class=" icon-picture"></i>Gallery</a> </li>
      <li class="bg_lo"> <a href="viewproject.php"> <i class="icon-group"></i> Projects </a> </li>
    </ul>
  </div>
 <!-- include file here-->
 <div class="row-fluid">
      <div class="span12">
  
    <div class="widget-box">
        <div class="container-fluid">
          <div class="widget-content nopadding">
          <div class="widget-box">
         <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5></h5>
            <span class="label label-info">members</span> </div>
     
          </div>

        </div>
    </div>

  </div>
</div>
</div>

  <div class="col-md-4"></div>
  <div class="col-md-4">
<ul class="pagination-lg pager " style="display: inline; margin-left: 200px; ">
   <!--<?php //echo  $paginationCtrls ; ?>-->
  </ul>
  </div>
  <div class="col-md-4"></div>

 </div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12">Copyright © 2019. All right reserved by
                            <a class="color-primary" href="http://damisa.tech/" target="_blank">Damisa Gurus Limited</a></div>
</div>
<!--end-Footer-part-->
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.calendar.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
