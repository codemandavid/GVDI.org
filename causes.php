<?php

include("admin/connection.php");
include("projpage.php");

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
                         our Projects
                      </h3>

                      <p class="page-breadcrumb">
                          <a href="index.php">Home</a> / Projects
                      </p>


                  </div>

             </div> <!-- end .row  -->

         </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <!--  MAIN CONTENT  -->

        <!--  CAUSE SECTION  -->

        <section class="section-content-block section-secondary-bg">

            <div class="container wow fadeInUp">
                 <div class="row"> 
				 <?php 
                $query= "SELECT *  FROM project_table  ORDER BY id  DESC $limit";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {  
                 $me= $fetch["proj_img"]; 
                  $id=$fetch['id'] ;
                  $title=$fetch['proj_title'];           
                ?>

					<div class="col-md-6 col-sm-6">
					    <div class="cause-wrapper xs-margin">
                                <div class="col-sm-12 no-padding">
                                    <figure class="cause-img">
                                        <img src="admin/gallery/<?php  echo $me; ?>" alt="Cause" />
                                    </figure> <!-- end .cause-img  -->
                                </div> <!-- end .col-sm-4  -->

                                <div class="col-sm-12 no-padding">
                                    <div class="cause-content">
                                        <div class="cause-text">
                                            <h5><a href="#"> <?php  echo " <a href='cause-single.php?id=$id'>$title</a>"; ?></a></h5>
                                            <p><?php  
                  $string= $fetch['proj_details']; 
               
  //strip tag to avoid breaking any html
$stringstrip=strip_tags($string);
if (strlen($stringstrip) > 80) {
  //truncate string
  $stringcut= substr($stringstrip, 0, 80);
  $endpoint=strrpos($stringcut, ' ');
  //if string doesn't contain any space then it will cut without word basis
  $stringview= $endpoint? substr($stringcut, 0, $endpoint):substr($stringcut, 0);

  echo $stringview. "...<br><a href='cause-single.php?id= $id 'class='btn readmore text-right'>Read More</a>";
        
}else{
  echo $string;
}
                 ?> </p>
                                        </div> <!--  end .cause-text  -->
                                     
                                        <div class="col-sm-12">
                                                <div class="fund-item-text">
                                                   
                                                </div> <!--  end .fund-item-text  -->
                                                <div class="progress">
                                                    <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bcm"></div>
                                                    <span data-raised_percentage="" class="fund-raised">GVDI</span>
                                                </div> <!--  end .progress  -->
                                            </div>
                                           
                                            
                                        

                                    </div> <!-- end .cause-content  -->

                                </div> <!-- end .col-sm-8  -->
						</div>
						
					</div>
                     <?php } ?> 
					
					
                </div> <!-- end .row  -->
				
				              
                              
                
            </div> <!-- end .container  -->

        </section> <!-- end .cause-section-1  -->
         <div class="blog-pagination text-center clearfix">                

                                <ul class="pagination">

                                   <?php echo  $paginationCtrls ; ?>          

                                </ul> <!-- end pagination  -->

                            </div> 
    
        
       <!-- FOOTER  -->
        
        <?php include('footer.php'); ?>  
      
   </body>


</html>