<?php 
session_start();
include("admin/connection.php");

if (isset($_GET['id'])) {
  $newid= $_GET['id'];
}


$error="";
if (array_key_exists("submit",$_POST)) {

   
if (!$_POST['name']) {
    $error.="Name is required <br>";
    
}
if (!$_POST['email']) {
    $error.="Email is required <br>";
    
}
if (!$_POST['message']) {
    $error.="Comment is required <br>";
    
}

if ($error !="") {
    $error = "Please Confirm Your Fields<br>".$error;
}else{
   $name= mysqli_real_escape_string($conn, $_POST['name']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
     $message=mysqli_real_escape_string($conn, $_POST['message']);
     $newid= $_GET['id'];
     $date=date("d m Y");
  $sql="INSERT INTO project_comment_table (name,blog_id,email,comment,date) VALUES ('$name','$newid','$email','$message','$date')";
  if (mysqli_query($conn, $sql)) {
    
} else {
    $error="There was a Problem uploading your comment, Try Again<br>".mysqli_error($conn);




  }
 }
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

   

<head>
        <meta charset="utf-8">
        <title>GLOBAL VISION FOR DEVELOPMENT INITIATIVES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Greenlife - Nature & Environmental Non-Profit HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/logo.png" />
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
        
    <body> 

        <div id="preloader">
            <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
        </div>

       <!--  HEADER -->

        <header class="main-header clearfix">

            <div class="top-bar">

                <div class="container">

                    <div class="row clearfix">

                        <div class="col-md-6 col-sm-12">

                            <span class="top-phone-no">
                                <i class="fa fa-phone-square"></i> 
                               (+234) 802 616 0134
                            </span>

                            <span class="top-email-info">
                                <i class="fa fa-paper-plane"></i>
                                <a href="#">info@gvdi.org</a>
                            </span>

                        </div> <!-- end col-sm-6  -->

                        <div class="col-md-6 col-sm-12 text-right hidden-xs top-donation-btn-container">

                            <a href="#" title="Donate Now" class="btn top-donate-btn" >Donate Now</a>
                            <a href="#" title="Join Now" class="btn top-join-btn" >Join Us Now</a>

                        </div> <!-- end col-sm-6  -->

                    </div> <!-- end .row  -->

                </div> <!--  end .container -->

            </div> <!--  end .top-bar  -->
            
               <?php include("header.php"); ?>


        </header> <!-- end main-header  -->

        <section class="page-header" data-stellar-background-ratio="0.1">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            Projects
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / <a href="causes.php">All Projects</a> / Projects
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <section class="section-content-block">

            <div class="container">

                    <div class="row">

                        <div class="col-sm-12">

                             <?php 
                $query= "SELECT *  FROM project_table WHERE id ='".$newid."'  ";
                $run=mysqli_query($conn,$query);
                $fetch= mysqli_fetch_array($run);
              
              if ($fetch) {
                   
               
                ?>

                            <article class="post single-post-inner">

                                <div class="post-inner-featured-content">
                                    <img alt="" src="admin/gallery/<?php echo $fetch["proj_img"]; ?>">
                                 </div>
                                
                                
                               <!-- <div class="cause-info-container">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 text-center causes-info-block"> 
                                            <i class="fa fa-road donate-font-size"></i> 
                                            <br> <strong>Goal:</strong> $10,000
                                        </div>
                                        <div class="col-md-3 col-sm-12 text-center causes-info-block"> 
                                            <i class="fa fa-heart  donate-font-size"></i> <br> 
                                            <strong>Raised:</strong> $5,900
                                        </div>
                                        <div class="col-md-3 col-sm-12 text-center causes-info-block">
                                            <i class="fa fa-line-chart  donate-font-size"></i> <br> 
                                            <strong>Progress:</strong> 50 %
                                        </div>
                                        <div class="col-md-3 col-sm-12 text-center causes-info-block"> 
                                            <a class="btn btn-success btn-sm btn-donate" href="#"> Donate Now !</a>
                                        </div>
                                    </div>                
                                </div>-->

                                <div class="single-post-inner-title">
                                     <h2><?php echo $fetch['proj_title']; ?></h2>
                                     <p class="single-post-meta"><i class="fa fa-user"></i>&nbsp; ADMIN &nbsp; &nbsp; <i class="fa fa-share"></i>&nbsp;GVDI Projects </p>
                                 </div>

                                <div class="single-post-inner-content">
                                     <p><?php echo $fetch['proj_details']; ?></p>

                                 </div>

                               


                            </article> <!--  end single-post-container -->

                           

                            <div class="post-nav-section clearfix">

                                <a class="btn btn-primary fr" href="#">Next Cause <i class="fa fa-angle-double-right"></i></a>
                                <a class="btn btn-primary" href="#"><i class="fa fa-angle-double-left"></i> Previous Cause</a>

                            </div> <!-- end .post-nav-section  -->

                           

                            <div class="comments-area" id="comments">
                                <a href="#respond" class="article-add-comments"><i class="fa fa-plus"></i></a>         
                                <div class="topic-bold-header clearfix">
                                    <h4>comments</h4>
                                </div> <!-- end .topic-bold-header  -->

                                               


                                <ol class="commentslist">
                                     <?php 

                $query= "SELECT *  FROM project_comment_table WHERE blog_id = $newid";
                $run=mysqli_query($conn,$query);
                 while ($fetching= mysqli_fetch_array($run) ) {
                 $_SESSION['comm_id']=$fetching['id'];              
                ?>
                                    <li>
                                        <article class="clearfix">
                                            <header>
                                                <h5><a href="#"><?php echo $fetching['name'];?></a></h5>
                                                <p><span>on<?php echo $fetching['date'];?></span><a href="#">Reply</a></p>
                                            </header>

                                            <figure class="comment-avatar">
                                                <a href="#">
                                                    <img src="images/user.png" alt="Avatar">
                                                </a>
                                            </figure>

                                            <div class="comment_text">
                                               <?php echo $fetching['comment'];?>
                                            </div>

                                        </article>
                                    </li>
                                     <?php } ?>

                                    
                                       
                                   
                                    
                                <div class="comments-nav-section clearfix">

                                    <a href="#" class="btn btn-primary fr">Newer Comments <i class="fa fa-angle-double-right"></i></a>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Older Comments</a>

                                </div> <!-- end comments-nav-section-->

                                <div id="respond">
                                    <?php
    if ($error!="") {
  echo "<p class='alert alert-success alert-dismissable'>$error</p>";
} ?>

                                    <div class="topic-bold-header clearfix">
                                        <h4>Leave a comment</h4>
                                    </div> <!-- end .topic-bold-header  -->

                                    <form role="form" action="#" method="post" id="comment-form">

                                        <div class="form-group">
                                                                           
                                            <input type="text" class="form-control" name="name" id="author" placeholder="Name">                                            
                                        </div>

                                        <div class="form-group">
                                    
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                        

                                        <div class="form-group">
                                
                                            <textarea class="form-control" rows="5" name="message"  placeholder="Write Your Comment"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-custom">Submit Comment</button>
                                        </div>

                                    </form>


                                </div> <!-- end respond-->

                            </div> <!-- end comments-area-->

                        </div> <!--  end .single-post-container -->

                    </div> <!--  end row  -->

            </div> <!--  end container -->

        </section> <!-- end .section-content-block  --> 
         <?php }else{

          echo "<div class='alert alert-warning duke'>
  <strong>SORRY!</strong> The Page You have requested does not exist
</div>";  

       
       }
       ?>  
        
       <!-- FOOTER  -->
        
         <?php include('footer.php'); ?>  
      
   </body>


<!-- Mirrored from templates.bwlthemes.com/wish-charity/cause-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2019 09:27:26 GMT -->
</html>