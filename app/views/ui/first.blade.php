<!DOCTYPE html>
<meta charset="utf-8">
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
    {{ HTML::style('css/nv.d3.css'); }}
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
    <div class="row filter">
      <div class="col-sm-2 text-center">
        <div style="font-size:20px;">Filter By:</div>
      </div>
      <div class="col-sm-2 text-center">
        <select class="form-control" ng-model="statusCard">
          <option value="">Select Status</option>
          <option>ready</option>
          <option>processing</option>
          <option>completed</option>
        </select>
      </div>
      <div class="col-sm-2 text-center">
        <input class="form-control" id="datepicker1" placeholder="Start Date" type="date" ng-model="start_date">
      </div>
      <div class="col-sm-2 text-center">
        <input class="form-control" id="datepicker2" type="date" placeholder="End Date" ng-model="end_date">
      </div>
      <div class="col-sm-2 text-center">
        <input type="text" ng-model="name" class="form-control" id="" placeholder="File Name">
      </div>
      <div class="col-sm-2 text-center">
        <button class="btn btn-default" ng-click="clearall()">Clear All</button>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="container">
    <hr>
    <div class="row">
      <div class="col-sm-12">
        <div class="text-center">
          {{ Form::open(array('url' => 'upload_csv', 'id' => "upload_form")) }}
          <!-- <form id="upload_form" a> -->
          <input style="display: none" type="file" id="file" name="file">
          <button id="main_upload_button" type="submit" class="btn btn-info">
            <h5>
              <i class="fa fa-plus"></i>
              &nbsp;
              Add New Email List
            </h5>
          </button>
          <!-- </form> -->
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  <!--  -->
  <br>
  <!--  -->

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
  </div> -->
  
  <!--  -->
  
  <!-- <div class="drop_zone">
    <div class="uploading-box">
      <div class="text-center">
        <h6 class="file-title">test-list.csv</h6>
        <div class="graph"></div>
        <h5><strong>PENDING...</strong></h5>
      </div>
    </div>
  </div> -->
  
  <!--  -->

  <br>

  <div id="drop_zone" class="container drop-zone">
    <div class="row">

      <div class="col-sm-3 col-xs-12" ng-repeat="card in cards | filter:statusCard | filter:name | daterange : start_date : end_date">

        <div class="div-margin" ng-if="card.status == 'ready' ">
          <!-- card start -->
          <div class="card-style">
            <div class="clearfix">
              <!-- remove-button-on-card -->
              <div class="clearfix">
                <!-- <div class="pull-right">
                  <a href="">
                    <i class="fa fa-remove icon-style"></i>
                  </a>
                </div> -->
                <br>
              </div>
              <!-- card content -->
              <div class="clearfix">
                <div class="text-center">
                  <h6 class="file-title"><%card.name%></h6>
                  <hr class="hr-style">
                  <h5 class="title-heading"><STRONG>TOTAL RECORDS</STRONG></h5>
                  <H5 class="title-value">98</H5>
                  <h5 class="title-heading"><STRONG>VARIFICATIONS</STRONG></h5>
                  <H5 class="title-value">98</H5>
                  <hr class="hr-style">
                  <div ng-show="progress">
                    {{ HTML::image('img/loading.gif','progressbar',['width'=>"100%"]) }}
                  </div>
                  <button class="btn btn-primary btn-margin-bottom" ng-show="changestatus" ng-click="changeCardStatus(card)">Let's Get Started</button>
                </div>
              </div>            
            </div>
          </div>
          <!-- card end -->
        </div>

        <div class="div-margin" ng-if="card.status == 'processing' ">
          <!-- card start -->
          <div class="card-style">
            <div class="clearfix">
              <!-- remove-button-on-card -->
              <div class="clearfix">
                <!-- <div class="pull-right">
                  <a href="">
                    <i class="fa fa-remove icon-style"></i>
                  </a>
                </div> -->
                <br>
              </div>
              <!-- card content -->
              <div class="clearfix">
                <div class="text-center">
                  <h6 class="file-title"><%card.name%></h6>
                  <div class="">
                    <nvd3-pie-chart
            data="card.data.graphdata"
            id="exampleId<%$index%>"
            margin="{left:0,top:20,bottom:0,right:0}"
            x="xFunction()"
            y="yFunction()"
            labelType="value"
            interactive = "true"
            tooltips = "true"
            tooltipcontent = toolTipContentFunction();
            donut="true"
            donutRatio=".5"
            donutLabelsOutside="false"
            objectequality = "true"
            >
        <svg height="200"></svg>
    </nvd3-pie-chart>
                  </div>
                  <h5><strong>PENDING...</strong></h5>
                </div>
              </div>            
            </div>
          </div>
          <!-- card end -->
        </div>

        <div class="div-margin" ng-if="card.status == 'completed' ">
          <!-- card start -->
          <div class="sandbox-wrap">
            <div class="card-flip-3d">
              <!--  -->
              <div class="card front">
                <!-- remove-button-on-card -->
                <div class="clearfix">
                  <div class="">
                    <a href="">
                      <i class="fa fa-share flip-trigger icon-style"></i>
                    </a>
                  </div>
                </div>
                <!-- card content -->
                <div class="clearfix">
                  <div class="text-center">
                    <h6 class="file-title"><%card.name%></h6>
                    <div class="button-distance">
                      <button class="btn btn-default btn-style-completed" data-toggle="modal" data-target="#myModal">Download</button>
                    </div>
                    <div class="button-distance">
                      <button class="btn btn-default btn-style-completed">Share</button>
                    </div>
                    <div class="button-distance">
                      <button class="btn btn-default btn-style-completed">Save To</button>
                    </div>
                    <div class="button-distance">
                      <button class="btn btn-default btn-style-completed">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="card back">
                <!-- remove-button-on-card -->
                <div class="clearfix">
                  <div class="pull-right">
                    <a href="">
                      <i class="fa fa-reply flip-trigger icon-style"></i>
                    </a>
                  </div>
                </div>
                <!-- card content -->
                <div class="clearfix">
                  <div class="text-center">
                    <h6 class="file-title"><%card.name%></h6>
                    <div class="">
                       <nvd3-pie-chart
            data="card.data.graphdata"
            id="exampleId<%$index%>"
            margin="{left:0,top:20,bottom:0,right:0}"
            x="xFunction()"
            y="yFunction()"
            labelType="value"
            interactive = "true"
            tooltips = "true"
            tooltipcontent = toolTipContentFunction();
            donut="true"
            donutRatio=".5"
            donutLabelsOutside="false"
            objectequality = "true"
            >
        <svg height="200"></svg>
    </nvd3-pie-chart>
                    </div>
                    <button class="btn btn-default btn-style-completed">Delete</button>
                    <br>
                    <a href="" class="a-style" data-toggle="modal" data-target="#myModal">Full Report</a>
                  </div>
                </div>              
              </div>
              <!--  -->
            </div>
          </div>
          <!-- card end -->
        </div>

      </div><!-- col-md-3 completed -->
    </div><!-- row completed -->
  </div><!-- container completed -->

  <br>


      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Full Report</h4>
            </div>
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

                  <nvd3-pie-chart
            data="exampleData"
            id="exampleId3"
            margin="{left:0,top:20,bottom:0,right:0}"
            x="xFunction()"
            y="yFunction()"
            labelType="value"
            interactive = "true"
            tooltips = "true"
            tooltipcontent = toolTipContentFunction();
            donut="true"
            donutRatio=".5"
            donutLabelsOutside="false"
            objectequality = "true"
            >
        <svg height="200"></svg>
    </nvd3-pie-chart>

                  <br><br><br><br><br><br><br><br>
                  
                  <button class="btn btn-primary">
                  Full Download
                  </button>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
          </div>
        </div>
      </div>


      
      
      <!-- model completed -->
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




<!-- chart liberey -->
{{ HTML::script('js/d3.js'); }}
{{ HTML::script('js/nv.d3.js'); }}
{{ HTML::script('js/angularjs-nvd3-directives.js'); }}
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
  
  $('input[type="date"]').datepicker().prop('type','text');

  $(function() {
    $("#drop_zone").delegate( ".flip-trigger", "click", function() {
  			 $(this).parents(".card-flip-3d:first").toggleClass("flipped");
  	});
  }); 
</script>
</body>
</html>