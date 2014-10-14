<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


	{{ HTML::style('css/bootstrap-datetimepicker.min.css') }}
	{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/style.css') }}
	{{ HTML::style('css/main.css') }}


</head>

<body>

<div class="container">
<hr />
<table>
	<!--<tr>
		<td style="vertical-align:top">
			Filter By:- 
		</td>
		<td style="vertical-align:top">
			<div class="dropdown">
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
				Status
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Pending</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Prepped</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Loading</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Verifying</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Complete</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Error</a></li>
			
			  </ul>
			</div>
		</td>
		<td  style="vertical-align:middle">
			<div class="control-group">
                <div class="controls input-append date form_date"  data-link-field="dtp_input2" >
                    <input size="16" type="text" value="" readonly placeholder="Start Date" style="width:100px" >
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
		</td>
		<td>
		<div class="control-group">
                <div class="controls input-append date form_date" data-link-field="dtp_input3">
                    <input size="16" type="text"  placeholder="End Date" value="" readonly style="width:100px">
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input3" value="" /><br/>
            </div>
		</td>
		<td style="vertical-align:top">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="File name">
			</div>
		</td>
		<td style="vertical-align:top">
			<button class="btn btn-default" type="button">
			    Clear Filter
			</button>
		</td>
	</tr>-->
	<tr>
		<td colspan="6" style="vertical-align:middle">
			<table width="100%">
				<tr>
					<td colspan="18">
						Phase 1 Checks
					</td>
				</tr>
				<tr>
					<td width="5px">
						<input type="checkbox" id="chksyntax" name="chksyntax"  style="vertical-align:top"/>
					</td>
					<td>
						syntax
					</td>
									<td width="5px">
						<input type="checkbox" id="chkde_duplicate" namme="chkde_duplicate" style="vertical-align:top" />
					</td>
					<td>
						de_duplicate
					</td>
					<td width="5px">
						<input type="checkbox" id="chkdomain_check" name="chkdomain_check" style="vertical-align:top"/>
					</td>
					<td>
						domain_check
					</td>
					<td width="5px">
						<input type="checkbox" id="chkhr_recipient" name="chkhr_recipient" style="vertical-align:top"/>
					</td>
					<td>
						hr_recipient
					</td>
					<td width="5px">
						<input type="checkbox" id="chkhr_domain" name="chkhr_domain" style="vertical-align:top"/>
					</td>
					<td>
						hr_domain
					</td>
					<td width="5px">
						<input type="checkbox" id="chkhr_complain" name="chkhr_complain" style="vertical-align:top"/>
					</td>
					<td width="">
						hr_complain
					</td>
					<td width="5px">
						<input type="checkbox" id="chkhr_role" name="chkhr_role" style="vertical-align:top"/>
					</td>
					<td>
						hr_role
					</td>
					<td width="5px">
						<input type="checkbox" id="chkhr_throwaway" name="chkhr_throwaway" style="vertical-align:top"/>
					</td>
					<td>
						hr_throwaway
					</td>
					<td width="5px">
						<input type="checkbox" id="chkspam_trap" name="chkspam_trap" style="vertical-align:top"/>
					</td>
					<td>
						spam_trap
					</td>
				</tr>
				
				<tr>
					<td colspan="18">
						Phase 2 Checks
					</td>
				</tr>
				
				
								<tr>
					<td width="5px">
						<input type="checkbox" id="chkmta-check" name="chkmta-check"  style="vertical-align:top"/>
					</td>
					<td>
						mta-check
					</td>
									<td width="5px">
						<input type="checkbox" id="chksm-check" namme="chksm-check" style="vertical-align:top" />
					</td>
					<td>
sm-check
					</td>
					<td width="5px">
						<input type="checkbox" id="chkbp-check" name="chkbp-check" style="vertical-align:top"/>
					</td>
					<td colspan="12">
		bp-check
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	<td colspan="6">
		<iframe src="../fileUpload/index.html" style="border-style:dotted; border-color:#999999" height="200px" width="900px"></iframe>
	</td>
	</tr>
		<tr>
		<td colspan="6">
		<span class="btn btn-success fileinput-button" id="btnSubmit">
                    Submit
        </span>
		</td>
	</tr>
	
</table>





</div>


			<div id="dvLoader" style="display:none; top:0; left:0; height:100%; width:100%; position:absolute; background-color:#000000" >
				<div class="InnerContainer">
				<canvas id="myLoader" width="200" height="200"></canvas>	
				</div>
			</div>
			
			<div id="dvChart" style="display:none;">
				<table>

<tr>
	<td width="250px">
		<canvas id="myChart" width="200" height="200"></canvas>	
	</td>
	<td>
		<div>
			<table>
				<tr>
					<td>
						<a href="#">Invalid Emails</a>
					</td>
				</tr>
				<tr>
					<td >
						<a href="#">Valid Emails</a>
					</td>
				</tr>
			</table>
		</div>
	</td>
</tr>
</table>

			</div>

	{{ HTML::script('js/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/bootstrap-datetimepicker.js') }}
	{{ HTML::script('js/main.js') }}
</body>
</html>

