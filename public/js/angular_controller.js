angular.module('email')

    // event controller ------------------------------------------------------------------------------
    .controller('emailsController',function($scope, cardArray){


        // =======================================================

        // variable declaration

        $scope.cards = [];

        $scope.statusCard = "";

        // $scope.start_date = "";

        // $scope.end_date = "";
        
        $scope.name = "";

        $scope.myDateRange = '';

        // =======================================================

        // loading cards in DOM

        loadCards();

        function loadCards(){
          $scope.cards = cardArray.get();
        }

        // =======================================================

        // clear filter

        $scope.clearall = function(){

          $scope.statusCard = "";

          $scope.start_date = undefined;

          $scope.end_date = undefined;

          $scope.name = "";

          $scope.myDateRange = "";

        }

        // =======================================================  

        $scope.exampleData = [
                {
                    key: "Valid",
                    y: 0
                }, {
                  key: "Invalid",
                  y: 50
                }, {
                  key: "Unchecked",
                  y: 100
                }
            ];

            $scope.xFunction = function(){
                return function(d) {
                    return d.key;
                };
            }
            $scope.yFunction = function(){
                return function(d) {
                    return d.y;
                };
            }

            $scope.descriptionFunction = function(){
                return function(d){
                    return d.key;
                }
            }

            var i = 0;

            var interval = setInterval(function(){
                $scope.$apply(function(){
                    var data = $scope.exampleData;
    
                    i = i + 1 ;

                    data[0].y = data[0].y + i;
                    data[1].y = data[1].y - 1;
                    data[2].y = data[2].y - 1;
              
                    if (i === 50){

                      clearInterval(interval);

                    }
                    $scope.exampleData = data;
                })
            }, 1000);

            $scope.toolTipContentFunction = function(){
              return function(key, x, y, e, graph) {
                  return '<div style="text-align:center;font-weight:bold">' + key + '</div>' +
                        '<div style="text-align:center;">' + x + '</div>'
              }
            }
        
    });

$(document).ready(function() {
  $("#file").change(function() {
    $("#upload_form").submit();
  })
  $("#main_upload_button").on('click', function() {
    // alert("here");
    $("#file").click();
  })
})