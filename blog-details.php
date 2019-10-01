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
  $sql="INSERT INTO comment_table (name,blog_id,email,comment,date) VALUES ('$name','$newid','$email','$message','$date')";
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

        <style type="text/css">
            .duke{ font-size:40px; color:green;  }
        </style>
        
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
                            Blog Post
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="index.php">Home</a> / <a href="blog.php">Blog</a> / Single Post
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <?php 
                $query= "SELECT *  FROM blog_table WHERE id ='".$newid."'  ";
                $run=mysqli_query($conn,$query);
                $fetch= mysqli_fetch_array($run);
              
              if ($fetch) {
                   
               
                ?>
        <section class="section-content-block">

            <div class="container">

                    <div class="row">

                        <div class="col-md-8 col-sm-12">

                           

                            <article class="post single-post-inner">

                                <div class="post-inner-featured-content">
                                    <img alt="" src="admin/gallery/<?php echo $fetch["blog_img"]; ?>">
                                 </div>

                                <div class="single-post-inner-title">
                                     <h2><?php echo $fetch['blog_title']; ?></h2>
                                     <p class="single-post-meta"><i class="fa fa-user"></i>&nbsp; Admin &nbsp; &nbsp; <i class="fa fa-share"></i>&nbsp; GVDI Blog posts</p>
                                 </div>

                                <div class="single-post-inner-content">
                                     <p><?php echo $fetch['blog_details']; ?></p>

                                 </div>

                                


                            </article> 
                            <!--  end single-post-container -->
                                                      
                          

                            <div class="comments-area" id="comments">
                                <a href="#respond" class="article-add-comments"><i class="fa fa-plus"></i></a>         
                                <div class="topic-bold-header clearfix">
                                    <h4>comments</h4>
                                </div> <!-- end .topic-bold-header  -->

                                               


                                <ol class="commentslist">
                                        <?php 

                $query= "SELECT *  FROM comment_table WHERE blog_id = $newid";
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
                                                 <p><?php echo $fetching['comment'];?></p>
                                            </div>

                                        </article>


                                    </li>
                                     <?php } ?>

                                </ol>

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
                                                                           
                                            <input type="text" class="form-control" name="name" placeholder="Name">                                            
                                        </div>

                                        <div class="form-group">
                                    
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                       

                                        <div class="form-group">
                                
                                            <textarea class="form-control" rows="5" name="message" placeholder="Write Your Comment"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-custom">Submit Comment</button>
                                        </div>

                                    </form>


                                </div> <!-- end respond-->

                            </div> <!-- end comments-area-->

                        </div> <!--  end .single-post-container -->

                        <div class="col-md-4 col-sm-12">

                            <div class="widget site-sidebar">

                                <h2 class="widget-title">Search</h2>

                                <form action="https://templates.bwlthemes.com/wish-charity/index.html" id="search-form" class="search-form" role="form" method="get">

                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    </div>

                                    <input type="hidden" value="submit" />

                                </form> <!-- end #search-form  -->

                            </div> <!--  end .widget -->            


                           
                            <div class="widget site-sidebar">

                                <h2 class="widget-title">Recent Posts</h2>

                                 <?php 
                $sql= "SELECT *  FROM blog_table ORDER BY id  DESC LIMIT 3";
                $run5=mysqli_query($conn,$sql);
                 while ($fetch1= mysqli_fetch_array($run5) ) {  
                 $me= $fetch1["blog_img"];
                 $id2=$fetch1["id"];            
                ?>

                                <div class="single-recent-post">
                                <img alt="" class="single-post-thumb" src="admin/gallery/<?php  echo $me; ?>">
                                    <a href="#"> <?php $title=$fetch1['blog_title']; ?>
                                    <?php echo "<a href='blog-details.php?id=$id2'> $title </a>"; ?> </a>
                                    <span><i class="fa fa-calendar icon-color"></i>&nbsp;<?php  echo $fetch1['date']; ?></span>
                                </div>
                                    <?php } ?>

                            </div> <!--  end .widget -->

                            <div class="widget site-sidebar">

                                <h2 class="widget-title">Tags</h2>

                                <ul class="widget-recent-tags clearfix">

                                    <li>
                                        <a href="index.php" title="">Home</a> 
                                    </li>

                                    <li>
                                        <a href="about.php" title="">About</a> 
                                    </li>

                                    <li>
                                        <a href="gallery.php" title="">Gallery</a> 
                                    </li>

                                    <li>
                                        <a href="causes.php" title="">Projects</a> 
                                    </li>
                                    
                                    <li>
                                        <a href="contact.php" title="">Contact</a> 
                                    </li>

                                    <li>
                                        <a href="#" title="">Gvdi </a> 
                                    </li>

                                </ul><!--  end .widget-recent-tags -->

                            </div> <!--  end .widget -->

                        </div> <!-- end .col-sm-4  -->

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

            <!--FOOTER CONTENT  -->
            	                     						
                 


    <!-- Back To Top Button  -->

    <a id="backTop">Back To Top</a>
       
        <script src="js/jquery.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/wow.min.js"></script>
       <script src="js/jquery.backTop.min.js"></script>
       <script src="js/waypoints.min.js"></script>
       <script src="js/waypoints-sticky.min.js"></script>
       <script src="js/owl.carousel.min.js"></script>
       <script src="js/jquery.stellar.min.js"></script>
       <script src="js/jquery.counterup.min.js"></script>
       <script src="js/venobox.min.js"></script>
       <script src="js/custom-scripts.js"></script>
       
   </body>


<!-- Mirrored from templates.bwlthemes.com/wish-charity/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2019 09:27:31 GMT -->
</html>