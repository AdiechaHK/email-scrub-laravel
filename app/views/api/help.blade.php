<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CodeGeeks">
    <meta name="keyword" content="EmailValidation">
    <meta name="description" content="This is a web application that validates your email id">

    <title>Email Validation API</title>

    <style type="text/css">
    #email-text-box {
        width: 100%;
        height: 100px;
    }
    </style>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/theme.css'); }}
    {{ HTML::style('css/bootstrap-reset.css'); }}

    {{ HTML::style('assets/font-awesome/css/font-awesome.css'); }}
    {{ HTML::style('css/flexslider.css'); }}
    {{ HTML::style('assets/bxslider/jquery.bxslider.css'); }}

    {{ HTML::style('css/style.css'); }}
    {{ HTML::style('css/style-responsive.css'); }}

<!--
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
-->
     <!--external css-->
<!--
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
-->

      <!-- Custom styles for this template -->
<!--
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
     <!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                    </button>
                    {{ HTML::link("/api", "Email Validation", array('class'=>"navbar-brand")) }}
                    <!-- <a class="navbar-brand" href="index.html">Flat<span>Lab</span></a> -->
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="#">CSV Upload</a></li> -->
                        <!-- <li><a href="#">API Documentation</a></li> -->
                        <!-- <li><a href="#">Collected Data</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Phase One - Scrubbing Demo</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="container">
        <div class="row">
            <!--Buttons start-->
            <div class="col-lg-6 col-sm-6">
                <!-- <h3 class="skills">API demo</h3> -->
                <p>
                    Write comma saparated multiple email ids <br/>
                    <span id="url" style="display:none">
                    {{ asset('') }}index.php/validateEmail/
                    </span>
                    <textarea id="email-text-box" placeholder="Enter email to validate"></textarea>
                    <br>
                    <br>
                    <br>
                    <button id="validate-btn" class="btn btn-primary">Validate</button>
                </p>
            </div>
            <div id="responce-container" class="col-lg-6 col-sm-6" >
               <h3 class="skills"> Responce </h3>
            <!--Buttons end-->
                <p class="content"></p>
            </div>
        </div>

    </div>
    <!--container end-->

     <!--footer start-->
     <footer class="footer" style="display:none;">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 col-sm-3">
<!--                      <h1>contact info</h1>
                     <address>
                         <p>Address: No.28-63877 street</p>
                         <p>lorem ipsum city, Country</p>

                         <p>Phone : (123) 456-7890</p>
                         <p>Fax : (123) 456-7890</p>
                         <p>Email : <a href="javascript:;">support@vectorlab.com</a></p>
                     </address>
 -->                 </div>
                 <div class="col-lg-5 col-sm-5">
                     <!-- <h1>Email Validation</h1> -->
                     <div>all rights are reserved</div>
<!-- 
                     <div class="tweet-box">
                         <i class="fa fa-twitter"></i>
                         <em>Contact <a href="#">@9033319723</a> or mail us <a href="#">info@codegeeks.in</a></em>
                     </div>
 -->
                 </div>
                 <div class="col-lg-3 col-sm-3 col-lg-offset-1">
<!--                      <h1>stay connected</h1>
                     <ul class="social-link-footer list-unstyled">
                         <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                         <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                         <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                         <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                         <li><a href="#"><i class="fa fa-skype"></i></a></li>
                         <li><a href="#"><i class="fa fa-github"></i></a></li>
                         <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
 -->                 </div>
             </div>
         </div>
     </footer>
     <!--footer end-->

    {{ HTML::script('js/jquery.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/hover-dropdown.js'); }}
    {{ HTML::script('js/jquery.flexslider.js'); }}
    {{ HTML::script('assets/bxslider/jquery.bxslider.js'); }}

    {{ HTML::script('js/jquery.easing.min.js'); }}
    {{ HTML::script('js/link-hover.js'); }}
    {{ HTML::script('js/common-scripts.js'); }}
    {{ HTML::script('js/api.js'); }}
    {{ HTML::script('js/api-help.js'); }}

      <!-- js placed at the end of the document so the pages load faster -->
<!-- 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>

 -->
     <!--common script for all pages-->
<!--     
    <script src="js/common-scripts.js"></script>

 -->
  <script>

  </script>

  </body>
</html>
