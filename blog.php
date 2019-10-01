<?php

include("admin/connection.php");
include("blogpage.php");

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
                          Blog Posts
                      </h3>

                      <p class="page-breadcrumb">
                          <a href="index.php">Home</a> / Blog
                      </p>


                  </div>

             </div> <!-- end .row  -->

         </div> <!-- end .container  -->
       
     </section> <!-- end .page-header  -->
     
       <!--  MAIN CONTENT  -->
       
       <section class="main-content">
       
            <div class="container">
                
                    <div class="row">

                        <div class="col-md-8 col-sm-12">

                             <?php 
                $query= "SELECT *  FROM blog_table  ORDER BY id  DESC $limit ";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {  
                 $me= $fetch["blog_img"]; 
                  $id=$fetch['id'] ;
                  $title=$fetch['blog_title'];           
                ?>

                            <article class="post single-post">
                                
                                <div class="single-post-content">

                                    <a title="" href="#">
                                        <img alt="" src="admin/gallery/<?php  echo $me; ?>" style="max-height:600px; width:700px " />
                                    </a>

                                </div> <!-- end .bd-view  -->
                                
                                <div class="single-post-title">

                                    <h2>
                                        <a href="#">
                                           <?php  echo " <a href='blog-details.php?id=$id'>$title</a>"; ?>
                                        </a>
                                    </h2> <!--  end blog-post-title  -->
                                    
                                    <p class="single-post-meta">                           

                                        <i class="fa fa-user"></i>
                                        &nbsp;Admin

                                        &nbsp;<i class="fa fa-book"></i>
                                        &nbsp;<a title="View all posts in  Environment Right " href="#">GVDI News</a>

                                        &nbsp;<i class="fa fa-calendar"></i>
                                        &nbsp;<?php  echo $fetch['date']; ?>

                                    </p>

                                    <p>
                                       <?php  
                  $string= $fetch['blog_details']; 
               
  //strip tag to avoid breaking any html
$stringstrip=strip_tags($string);
if (strlen($stringstrip) > 100) {
  //truncate string
  $stringcut= substr($stringstrip, 0, 100);
  $endpoint=strrpos($stringcut, ' ');
  //if string doesn't contain any space then it will cut without word basis
  $stringview= $endpoint? substr($stringcut, 0, $endpoint):substr($stringcut, 0);

  echo $stringview. "...<br><a href='blog-details.php?id= $id 'class='btn readmore text-right'>Read More</a>";
        
}else{
  echo $string;
}
                 ?> 
                                   <!-- <p class="text-right"><a class="btn readmore" href="#">Read More</a> </p> </p>-->

                                </div> <!-- end col-sm-8  -->

                            </article>
                            <?php } ?> 
                            
                           


                            

                        </div> <!--  end col-sm-8 -->

                       
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
       
       </section> <!-- end .main-content  -->
        <div class="blog-pagination text-center clearfix">                

                                <ul class="pagination">

                                   <?php echo  $paginationCtrls ; ?>          

                                </ul> <!-- end pagination  -->

                            </div> 

       <!-- FOOTER  -->
        
        <?php include('footer.php'); ?>  
      
       
   </body>


</html>
       