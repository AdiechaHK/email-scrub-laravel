// JavaScript Document

$(document).ready(function () {
					
					$('#dvLoader').show();
					setInterval(function() {
if(vData1 >= 100)
{
	$('#dvLoader').hide();
	$('#dvSummary').show();
	//$('.container').hide();
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

}, 700);								 
});


function PopulateDonutChart()
{
$.getScript('http://www.chartjs.org/assets/Chart.js',function(){
  var data = [{
        value: 60,
        color: "#F7464A"
    }, {
        value: 20,
        color: "#127898"
    },
	{
        value: 50,
        color: "#323439"
    }
    ]

    var options = {
        animation: false
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