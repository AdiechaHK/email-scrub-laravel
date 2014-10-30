<!DOCTYPE html>
<html lang="en" ng-app="email">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CodeGeeks">
    <meta name="keyword" content="EmailValidation">
    <meta name="description" content="This is a web application that validates your email id">
    <title>Email Validation UI</title>
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
    {{ HTML::style('css/ui.css'); }}
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- font awsome -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
  <body ng-controller="emailsController">
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
            <h1>DEMO - UI</h1>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
    </head>
    <body>
      <div ></div>
  </body>
</html>
<!--container start-->
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      <div style="font-size:20px;">Filter By:</div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <select class="form-control" ng-model="statusCard">
          <option></option>
          <option>ready</option>
          <option>processing</option>
          <option>completed</option>
        </select>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon">@</div>
          <input class="form-control" id="datepicker1" placeholder="Start Date" type="date" ng-model="start_date">
        </div>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon">@</div>
          <input class="form-control" id="datepicker2" type="date" placeholder="End Date" ng-model="end_date">
        </div>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <input type="text" ng-model="name" class="form-control" id="" placeholder="File Name">
      </div>
    </div>
    <div class="col-sm-2">
      <button class="btn btn-default" ng-click="clearall()">Clear All</button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <div class="text-center">
        {{ Form::open(array('url' => 'upload_csv', 'id' => "upload_form")) }}
         <!-- <form id="upload_form" a> -->
            <input style="display: none" type="file" id="file" name="file">
            <button id="main_upload_button" type="submit" class="btn btn-info">
              <h5><i class="fa fa-plus" ></i>&nbsp;Add New Email List</h5>
            </button>
          <!-- </form> -->
          {{ Form::close() }}

      </div>
      <br>
      <!-- <div class="drop_zone">
        <br>
        <div class="text-center">
          <h1>Drag Files Here</h1>
          <div class="drop_zone_desc">you can drag and drop csv file here to verify list,or click "Add New Email List" above<br>to select the file from computer,FTP server,or the Cloud.</div>
          <br>
          <div>
            <i class="fa fa-cloud-upload fa-icon"></i>
          </div>
        </div>
        </div>
        
        <div class="drop_zone">
        <div class="uploading-box">
          <div class="text-center">
            <h6 class="file-title">test-list.csv</h6>
            <div class="graph"></div>
            <h5><strong>PENDING...</strong></h5>
          </div>
        </div>
        </div> -->
      <div id="drop_zone" class="drop_zone">
        <div class="clearfix">
          <div ng-repeat="card in cards | filter:name | daterange : start_date : end_date">
            <div class="uploading-box" ng-if="card.status == 'ready' ">
              <div class="text-center">
                <!--  -->
                <i class="fa fa-remove icon-position"></i>
                <!--  -->
                <h6 class="file-title"><%card.name%></h6>
                <!--  -->
                <hr class="hr-style">
                <!--  -->
                <h5 class="title-heading"><STRONG>TOTAL RECORDS</STRONG></h5>
                <H5 class="title-value">98</H5>
                <!--  -->
                <h5 class="title-heading"><STRONG>VARIFICATIONS</STRONG></h5>
                <H5 class="title-value">98</H5>
                <!--  -->
                <h5 class="title-heading"><STRONG>TOTAL COST</STRONG></h5>
                <H5 class="title-value color">$0.98</H5>
                <!--  -->
                <hr class="hr-style">
                <!--  -->
                <button class="btn btn-primary btn-margin-bottom">Let's Get Started</button>
                <!--  -->
              </div>
            </div>
            <div class="uploading-box" ng-if="card.status == 'processing' ">
              <div class="text-center">
                <h6 class="file-title"><%card.name%></h6>
                <div class="graph"></div>
                <h5><strong>PENDING...</strong></h5>
              </div>
            </div>
            <div class="sandbox-wrap" ng-if="card.status == 'completed' ">
              <div class="card-flip-3d">
                <div class="card front">
                  <div class="text-center">
                    <!--  -->
                    <i class="fa fa-reply flip-trigger icon-position"></i>
                    <!--  -->
                    <h6 class="file-title"><%card.name%></h6>
                    <!--  -->
                    <button class="btn btn-default btn-style-completed" data-toggle="modal" data-target="#myModal">Download</button>
                    <br>
                    <button class="btn btn-default btn-style-completed">Share</button>
                    <br>
                    <button class="btn btn-default btn-style-completed">Save To</button>
                    <br>
                    <button class="btn btn-default btn-style-completed">Delete</button>
                    <!--  -->
                  </div>
                </div>
                <div class="card back">
                	<div class="text-center">
                    <!--  -->
                    <i class="fa fa-reply flip-trigger icon-position"></i>
                    <!--  -->
                    <h6 class="file-title"><%card.name%></h6>
                    <div class="graph"></div>
                    <!--  -->
                    <button class="btn btn-default btn-style-completed">Delete</button>
                    <!--  -->
                   	<br>
                    <a href="" class="a-style" data-toggle="modal" data-target="#myModal">Full Report</a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- <button type="button" class="close close-position" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> -->
            <div class="modal-body">
              <div class="clearfix">
                <div class="col-sm-6">
                  <h3>Verification Summary</h3>
                  <h4>Test-list.csv</h4>
                  <!--  -->
                  <br>
                  <table class="table">
                    <tr>
                      <td>
                        <h5 class="title-heading">
                          <STRONG>RECORD VERIFIED</STRONG>
                        </h5>
                      </td>
                      <td class="text-right">
                        <H5 class="title-value">5</H5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5 class="title-heading">
                          <STRONG>COST</STRONG>
                        </h5>
                      </td>
                      <td class="text-right">
                        <H5 class="title-value color">$0.98</H5>
                      </td>
                    </tr>
                  </table>
                  <!--  -->
                  <table class="table">
                    <tr>
                      <td>
                        <h6 class="title-heading">
                          VALID
                        </h6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">5</H6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">(5%)</H6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="title-heading">
                          INVALID
                        </h6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">89</H6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">(89%)</H6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="title-heading">
                          UNKNOWN
                        </h6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">6</H6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">(6%)</H6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="title-heading">
                          ACCEPT ALL
                        </h6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">0</H6>
                      </td>
                      <td class="text-right">
                        <H6 class="title-value">(0%)</H6>
                      </td>
                    </tr>
                  </table>
                  <!--  -->
                </div>
                <div class="col-sm-6 text-center">
                  <br><br><br><br><br><br><br><br>
                  <br><br><br><br><br><br><br><br>
                  <br><br><br>
                  <button class="btn btn-primary">
                  Full Download
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- model completed -->
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <!--Buttons start-->
    <div class="col-lg-6 col-sm-6">
      <!-- <h3 class="skills">API demo</h3> -->
      <p>This is left portion</p>
    </div>
    <div class="col-lg-6 col-sm-6" >
      <p> This is right portion</p>
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
          -->                 
      </div>
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
          -->                 
      </div>
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
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
{{ HTML::script('js/angular_project.js'); }}
{{ HTML::script('js/angular_services.js'); }}
{{ HTML::script('js/angular_controller.js'); }}
{{ HTML::script('js/angular-filter.js'); }}
{{ HTML::script('js/daterangepicker.js'); }}
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
  $( "#datepicker1" ).datepicker();
  $( "#datepicker2" ).datepicker();
</script>
<script type="text/javascript">
  $(function() {
    $("#drop_zone").delegate( ".flip-trigger", "click", function() {
  			 $(this).parents(".card-flip-3d:first").toggleClass("flipped");
  	});
  }); 
</script>
</body>
</html>