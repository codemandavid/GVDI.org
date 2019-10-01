<?php 


$error="";
$success="";
if (array_key_exists("submit",$_POST)) {

   
if (!$_POST['name']) {
    $error.="please tell us your Name <br>";
    
}
if (!$_POST['email']) {
    $error.="Your Email is required <br>";
    
}

if (!$_POST['subject']) {
    $error.="please Fill in all fields <br>";
    
}
if (!$_POST['message']) {
    $error.="please Fill in all fields <br>";
    
}

if ($error !="") {
    $error = "Incomplete Input<br>".$error;
}else{
    $Name=input($_POST['name']);
    $mail=input($_POST['message']);
     $subject=input($_POST['subject']);
 $Email=input($_POST['email']);
 $message = "Hello GVDI<br> You have recieved a mail from".$Email." and it says <br> ".$subject." <br> ".$mail." ";
            $cleanedFrom =  " ".$mail." ";
            $to ="info@gvdi.org";
            $subject = " ".$subject."";
            $headers = "From: " . $cleanedFrom . "\r\n";
            $headers .= "Reply-To: " . $cleanedFrom . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            if (mail($to, $subject, $message, $headers)){
              $success="Thankyou! We have recieved Your Message. We will reply you shortly";
            }else{
              $error="<b>Something went wrong, try again</b>";
            }

     header("location:contact.php");
   } //else{
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   //}
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
        <link rel="shortcut icon" href="images/Logo.png" />
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link href="css/bootstrap-social.css" rel="stylesheet" type="text/css" >
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
                              0802 616 0134
                            </span>

                            <span class="top-email-info">
                                <i class="fa fa-paper-plane"></i>
                                <a href="#">info@gvdi.org </a>
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
                            Contact Us
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="index.php">Home</a> / Contact
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->


        <!--  MAIN CONTENT  -->


     <!--    <section class="section-google-map-block wow fadeInUp">

            <div id="map_canvas"></div>

        </section> <!-- end .section-content-block  --> -->

        <section class="section-content-block section-contact-block">

            <div class="container">

                <div class="row">

                    <div class="col-sm-6 wow fadeInLeft">

                        <div class="contact-form-block">
                             <?php if ($error !=""){
    echo "<p class='alert alert-success alert-dismissable'>$error</p>";
    }?>

     <?php if ($success){
    echo "<p class='alert alert-success alert-dismissable'>$error</p>";
    }?>

                            <h2 class="contact-title">Say hello to us</h2>

                            <form role="form" action="#" method="post" >

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name">                                            
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="message" id="comment" placeholder="Message"></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" name="submit" class="btn btn-custom">Send Now</button>
                                </div>

                            </form>

                        </div> <!-- end .contact-form-block  -->

                    </div> <!--  end col-sm-6  -->

                    <div class="col-sm-6 wow fadeInRight">

                        <div class="content-block">

                            <h2 class="contact-title">Contact us</h2>

                            <ul class="contact-info">
                                <li>
                                    <span class="icon-container"><i class="fa fa-home"></i></span>
                                    <address>University Of Ibadan, Oyo State Nigeria.</address>
                                </li>
                                <li>
                                    <span class="icon-container"><i class="fa fa-phone"></i></span>
                                    <address><a href="#">+234-802 616 0134</a></address>
                                </li>
                                <li>
                                    <span class="icon-container"><i class="fa fa-envelope"></i></span>
                                    <address><a href="mailto:">info@gvdi.org </a></address>
                                </li>
                                <li>
                                    <span class="icon-container"><i class="fa fa-globe"></i></span>
                                    <address><a href="#">www.gvdi.org</a></address>
                                </li>
                            </ul>

                            <h2 class="contact-title">We are social</h2>

                            <div class="social-icons margin-top-11 clearfix">
                                <a title="Tweet It" href="#" class="btn btn-social-icon btn-twitter petition_share">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a title="Share at Facebook" href="#" class="btn btn-social-icon btn-facebook petition_share">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a title="Share at Google+" href="#" class="btn btn-social-icon btn-goggle-plus petition_share">
                                    <i class="fa fa-google-plus"></i>
                                </a>

                                <a title="Share at Pinterest" href="#" class="btn btn-social-icon btn-pinterest petition_share">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </div>

                        </div> <!-- end .content-block  -->

                    </div> <!--  end col-sm-6  -->

                </div> <!-- end row  -->

            </div> <!--  end .container -->

        </section> <!-- end .section-content-block  -->
    
        
       <!-- FOOTER  -->
        
        <?php include('footer.php'); ?>  
      
    </body>



</html>