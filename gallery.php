<?php 

include("admin/connection.php");
include("galpage.php");




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
        
        <!--  PAGE HEADING -->

        <section class="page-header" data-stellar-background-ratio="0.1">

            <div class="container">

              <div class="row">

                  <div class="col-sm-12 text-center">


                      <h3>
                         Gallery
                      </h3>

                      <p class="page-breadcrumb">
                          <a href="index.php">Home</a> / Gallery
                      </p>


                  </div>

             </div> <!-- end .row  -->

         </div> <!-- end .container  -->

      </section> <!-- end .page-header  -->

      <!--  MAIN CONTENT  -->

      <!--  GALLERY CONTENT  -->

        <section class="section-content-block">

            <div class="container">
                
                <div class="row section-heading-wrapper">

                    <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
                        <h2 class="section-heading"><span>Our</span> Gallery</h2>
                        <p class="section-subheading">
                            
                        </p>
                    </div> <!-- end .col-sm-10  -->

                </div> <!-- end .row  -->

            </div> <!--  end .container -->
            
            <div class="container wow fadeInUp">
                

                <div class="row no-padding-gallery">
                    <?php 
                $query= "SELECT *  FROM blog_gallery $limit";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {              
                ?>

                    <div class="col-md-3 col-sm-12 gallery-container">

                        <a class="gallery-light-box" data-gall="myGallery" href="admin/gallery/<?php  echo $fetch['image']; ?>">

                            <figure class="gallery-img">

                                <img src="admin/gallery/<?php  echo $fetch['image']; ?>" alt="gallery image" style="width:300px;height:250px" />

                            </figure> <!-- end .cause-img  -->

                        </a> <!-- end .gallery-light-box  -->

                    </div><!-- end .col-sm-3  -->
                    <?php } ?> 

                				
                </div> <!-- end .row  -->
                           
				</div> <!-- end .row  -->

                
            </div><!-- end .container  -->


        </section> <!-- end .section-content-block  --> 
        <div class="blog-pagination text-center clearfix">                

                                <ul class="pagination">

                                   <?php echo  $paginationCtrls ; ?>          

                                </ul> <!-- end pagination  -->

                            </div> 
    
       <!-- FOOTER  -->
        
        <?php include('footer.php'); ?>  
      
   </body>


</html>