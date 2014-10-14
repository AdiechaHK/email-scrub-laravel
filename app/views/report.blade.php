<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CodeGeeks">
    <meta name="keyword" content="EmailValidation">
    <meta name="description" content="This is a web application that validates your email id">

    <title></title>

{{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/theme.css'); }}
    {{ HTML::style('css/bootstrap-reset.css'); }}

    {{ HTML::style('assets/font-awesome/css/font-awesome.css'); }}
    {{ HTML::style('css/flexslider.css'); }}
    {{ HTML::style('assets/bxslider/jquery.bxslider.css'); }}

    {{ HTML::style('css/style.css'); }}
    {{ HTML::style('css/style-responsive.css'); }}
	    {{ HTML::style('css/main.css'); }}
	

<!--	{{ HTML::style('css/bootstrap-datetimepicker.min.css') }}
	{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/style.css') }}
	{{ HTML::style('css/main.css') }}-->


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
                    <h1>Email Validation - Verification</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->



<!-- Container Start -->
<div class="container">
				<div class="row" style="border-style:dotted; display:none; border-color:#999999; border-width:2px; border-radius:5px" id="dvSummary">

<div class="col-lg-3 col-sm-3"></div>
				<div class="col-lg-3 col-sm-3">
				<p class="text-left">
					<h3>Verification Summary</h3>
					<h5>File Name.csv</h5>
					<hr>
					
					<div class="row">
					<div class="col-lg-7 col-sm-7">
					 <p class="text-left">Records Verified</p>
					</div>
					<div class="col-lg-4 col-sm-4">
						<p class="text-right" id="lblTrec">130</p>
					</div>
					</div>
					
					<hr>
					
					<div class="row" id="dvInvalid">
					<div class="col-lg-7 col-sm-7">
					 <p class="text-left">Invalid</p>
					</div>
					<div class="col-lg-4 col-sm-4">
						<p class="text-right" id="lblInvalidRec">60</p>
					</div>
					</div>
					
										<div class="row" id="dvValid">
					<div class="col-lg-7 col-sm-7">
					 <p class="text-left">Valid</p>
					</div>
					<div class="col-lg-4 col-sm-4">
						<p class="text-right" id="lblValidrec">20</p>
					</div>
					</div>
					
					<div class="row" id="dvUnpro">
						<div class="col-lg-7 col-sm-7">
						 <p class="text-left">Unprocessed</p>
						</div>
						<div class="col-lg-4 col-sm-4">
							<p class="text-right" id="lblUnProcrec">50</p>
						</div>
					</div>
				</p>
				</div>
				
				<div class="col-lg-3 col-sm-3">
				<br>
				<br>
					<canvas id="myChart" width="200" height="200"></canvas>		
				</div>
				
				<div class="col-lg-3 col-sm-3"></div>
				</div>

</div>
<!-- Container Ends -->


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

<!-- Loader Div Starts --->


			<div id="dvLoader" style="display:none; top:0; left:0; height:100%; width:100%; position:absolute;" >
				<div class="InnerContainer">
				<canvas id="myLoader" width="200" height="200"></canvas>	
				</div>
			</div>
			
<!-- Loader Div Ends -->


			

<!--	{{ HTML::script('js/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/bootstrap-datetimepicker.js') }}
	{{ HTML::script('js/main.js') }}-->
	
	    {{ HTML::script('js/jquery.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/hover-dropdown.js'); }}
    {{ HTML::script('js/jquery.flexslider.js'); }}
    {{ HTML::script('assets/bxslider/jquery.bxslider.js'); }}

    {{ HTML::script('js/jquery.easing.min.js'); }}
    {{ HTML::script('js/link-hover.js'); }}
	    {{ HTML::script('js/bootstrap-fileinput.js'); }}
	{{ HTML::script('js/report.js') }}
</body>
</html>

