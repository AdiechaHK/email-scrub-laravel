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