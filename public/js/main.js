$(document).ready(function () {
						
							
                    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
            
			
			
$(document).on('click',"#btnSubmit",function(){
														 
					$('#dvLoader').show();
					setInterval(function() {


if(vData1 >= 100)
{
	$('#dvLoader').hide();
	$('#dvChart').show();
	$('.container').hide();
	PopulateDonutChart();
	}
else
{
$.getScript('http://www.chartjs.org/assets/Chart.js',function(){
//  alert("In");
 vData1 = parseInt(vData1,10) +5 ;
  vData2 = parseInt(vData2,10) -5 ;


  var data = [{
        value: vData1,
        color: "#F7464A"
    }, {
        value: vData2,
        color: "#E2EAE9"
    }
    ]

    var options = {
        animation: false
    };

    //Get the context of the canvas element we want to select
    var c = $('#myLoader');
    var ct = c.get(0).getContext('2d');
    var ctx = document.getElementById("myLoader").getContext("2d");
    /*************************************************************************/
    myNewChart = new Chart(ct).Doughnut(data, options);

})
	
	}

}, 1000);
										 
			});
			
            });

var vData1 = 0;
var vData2 = 100;


function PopulateDonutChart()
{
$.getScript('http://www.chartjs.org/assets/Chart.js',function(){
//  alert("In");
 vData1 = parseInt(vData1,10) +5 ;
  vData2 = parseInt(vData2,10) -5 ;


  var data = [{
        value: 30,
        color: "#F7464A"
    }, {
        value: 50,
        color: "#E2EAE9"
    }
	, {
        value: 60,
        color: "#E2EA00"
    }
	, {
        value: 70,
        color: "#E2EA11"
    }
    ]

    var options = {
        animation: false
    };

    //Get the context of the canvas element we want to select
    var c = $('#myChart');
    var ct = c.get(0).getContext('2d');
    var ctx = document.getElementById("myChart").getContext("2d");
    /*************************************************************************/
    myNewChart = new Chart(ct).Doughnut(data, options);

})

}