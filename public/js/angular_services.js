angular.module('email')
    
    .factory('cardService', function($http) {
        return {
            getallCards : function() {
                return $http.get('/email-scrub-laravel/public/index.php/service/getAllCards');
            },
            getcard : function(id) {
                return $http.get('/email-scrub-laravel/public/index.php/service/refreshCard/' + id)
            }
        }
    });


// angular.module('email')

//     .factory('cardArray', function() {

//       var cards_array = [
        /*
        status, // possible values :['ready', 'processing', 'completed']
        data, // for uploaded data = {'total_record': 98}
              // for verifying data = {'total_reocord': 98, 'verified': 57, 'good': 43, 'bed': 14}
              // for completed data = {'total_reocord': 98, 'verified': 57, 'good': 43, 'bed': 14}
        date, 
        name
        */

    //     {'status':'ready' , 'name':'list1.csv', 'date': 1414407041177  , 'data': {} , 'progressbBarValue' : 0 },
    //     {'status':'processing' , 'name':'list2.csv', 'date': 1414407041177 , 'data': {'graphdata':[
    //             {
    //                 key: "Valid",
    //                 y: 0
    //             }, {
    //               key: "Invalid",
    //               y: 50
    //             }, {
    //               key: "Unchecked",
    //               y: 100
    //             }
    //         ]} },
    //      {'status':'completed' , 'name':'list3.csv', 'date': 1414407041177 , 'data': {'graphdata':[
    //             {
    //                 key: "Valid",
    //                 y: 0
    //             }, {
    //               key: "Invalid",
    //               y: 50
    //             }, {
    //               key: "Unchecked",
    //               y: 100
    //             }
    //         ]} },
    //       {'status':'ready' , 'name':'list4.csv', 'date': 1414407041177 , 'data': {} , 'progressbBarValue' : 0 },
    //        {'status':'processing' , 'name':'list5.csv', 'date': 1414407041177 , 'data': {} },
    //         {'status':'completed' , 'name':'list6.csv', 'date': 1414407041177 , 'data': {} }

    //   ];

    //     return {
    //         get : function() {
    //             return cards_array;
    //         }
    //     }
    // });
