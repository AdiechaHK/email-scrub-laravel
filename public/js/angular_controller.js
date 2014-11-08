angular.module('email')

    // event controller ------------------------------------------------------------------------------
    .controller('emailsController',function($scope, cardService, $http){


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

          //Fetch all ReceivedMessages for LoggedIn user.
          cardService.getallCards()
              .success(function(data) {
                  $scope.cards = data;
                  for(i=0;i<$scope.cards.length;i++){
                    if($scope.cards[i].status === "ready"){
                      changingProgressValue($scope.cards[i]);
                    }
                  }
          });

          // $scope.cards = cardArray.get();

          // for(i=0;i<$scope.cards.length;i++){
          //   if($scope.cards[i].status === "ready"){
          //     changingProgressValue($scope.cards[i]);
          //   }
          // }

        }

        // =======================================================

        $scope.progress = true;

        $scope.changestatus = false;

        value = 0;

        function changingProgressValue(card){
          // console.log(card);

          var interval = setInterval(function(){
                $scope.$apply(function(){

                    value = card.progressbBarValue;

                    value = value + 10;

                    // var data = $scope.exampleData;
              
                    if (card.progressbBarValue === 100){

                      $scope.progress = false;

                      $scope.changestatus = true;

                      clearInterval(interval);                     

                    }

                    card.progressbBarValue = value;
                })
            }, 1000);

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
                    y: 70
                }, {
                  key: "Invalid",
                  y: 20
                }, {
                  key: "Unchecked",
                  y: 10
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

        // =======================================================

        $scope.changeCardStatus = function(card){

          console.log(card);

          card.status = "processing"

          card.data.graphdata = [

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