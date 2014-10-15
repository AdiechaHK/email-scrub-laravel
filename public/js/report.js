// JavaScript Document

$(document).ready(function () {
					
				//	$('#dvLoader').show();
					setInterval(function() {
if(vData1 >= 100)
{
/*	$('#dvLoader').hide();
	$('#dvSummary').show()*/;
	//$('.container').hide();
	$('#hVerify').hide();
	$('#lblValidrec').text(50);
	$('#lblInvalidRec').text(60)
	$('#lblTrec').text(110);
	
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
        animation: false,
		showTooltips: false
    };

	$('#lblProc').text(vData1);
    //Get the context of the canvas element we want to select
    var c = $('#myChart');
    var ct = c.get(0).getContext('2d');
    var ctx = document.getElementById("myChart").getContext("2d");
    /*************************************************************************/
    myNewChart = new Chart(ct).Doughnut(data, options);

})
	
	}

}, 700);								 
});


function PopulateDonutChart()
{
$.getScript('http://www.chartjs.org/assets/Chart.js',function(){
  var data = [{
        value: 60,
        color: "#F7464A"
    },
	{
        value: 50,
        color: "#323439"
    }
    ]

    var options = {
        animation: false,
		showTooltips: false
    };

$('#dvUnpro').css({"color":"#323439"});
$('#dvInvalid').css({"color":"#F7464A"});
$('#dvValid').css({"color":"#127898"});
    //Get the context of the canvas element we want to select
    var c = $('#myChart');
    var ct = c.get(0).getContext('2d');
    var ctx = document.getElementById("myChart").getContext("2d");
    /*************************************************************************/
    myNewChart = new Chart(ct).Doughnut(data, options);

})

}



var vData1 = 0;
var vData2 = 100;