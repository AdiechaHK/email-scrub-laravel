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
                    <h1>Email Validation - CSV Upload</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->



<!-- Container Start -->
<div class="container">
<!--<hr />
<table>


	<tr>

	</tr>
		<tr>
		<td colspan="6">
		<span class="btn btn-success fileinput-button" id="btnSubmit">
                    Submit
        </span>
		</td>
	</tr>
	
</table>-->

<div style="border-style:dotted; border-color:#999999; border-width:2px; border-radius:5px" height="500px" width="100%">

	<!-- Add New Email List Button -->
	<!-- Add New Email List Button Ends -->
	
	<div class="row" style="padding:10px">

		<form action="report" method="post">
	
		<!-- Left panel Checkboxes starts -->
		<div class="col-lg-3 col-sm-3">
			<h4> Phase 1 </h4>
	
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="syntax">syntax</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" name="de_duplicate" value="">de_duplicate</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="domain_check">domain_check</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="hr_recipient">hr_recipient</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="hr_domain">hr_domain</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="hr_complain">hr_complain</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="hr_role">hr_role</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="hr_throwaway">hr_throwaway</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="spam_trap">spam_trap</label>
			</div>
	
		</div>
		
		
		<!-- Left panel Checkboxes ends -->
		
		<!-- Right Panel Checkboxes starts-->
		<div class="col-lg-3 col-sm-3">
	<h4> Phase 2 </h4>
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="mta-check">mta-check</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" name="sm-check" value="">sm-check</label>
			</div>
			
			<div class="checkbox">
			  <label><input type="checkbox" checked="checked" value="" name="bp-check">bp-check</label>
			</div>
			
		</div>
		<!-- Right Panel Checkboxes Ends-->
		
		
		<!-- Blank Area for Chart starts -->
		<div class="col-lg-4 col-sm-4">
		<br>
		

			<input type="file" title="Browse" class='btn-primary'>
			<br>
			<br>	
		<input type="submit" value="Submit" class="btn btn-success">
		
		</div>
		
		<!-- Blank Area for Chart ends -->
		
		</form>		
		
	</div>



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
	{{ HTML::script('js/main.js') }}
</body>
</html>

