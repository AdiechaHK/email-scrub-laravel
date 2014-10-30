// angular.module('email')

//     .filter('dateRange', function(){

//     return function(input, startDate, endDate) {
//        angular.forEach(input, function(obj){

//         if(obj.received.getTime() >= startDate.getTime() && obj.received.getTime() <= endDate.getTime())   {
//             return obj;
//         }
//        });

//     };
// });


// function parseDate(input) {
//   var parts = input.split('-');
//   return new Date(parts[2], parts[1]-1, parts[0]); 
// }

angular.module('email').filter("daterange", function() {
  return function(cards, start_date, end_date) {

        var day = 1000 * 60 * 60 * 24;
        var condition ;
        var e_dt, s_dt;
        console.log(start_date,end_date)
        if(start_date == undefined) {
          if(end_date == undefined) {
            return cards;
          } else {
            e_dt = new Date(end_date);
            end_timestamp = e_dt.getTime();
            end_timestamp += day;
            condition = function(card) {
              return (card.date < end_timestamp);
            } 
          }
        } else {
          s_dt = new Date(start_date);
          start_timestamp = s_dt.getTime();
          if(end_date == undefined) {
            condition = function(card) {
              return (card.date > start_timestamp);
            }
          } else {
            e_dt = new Date(end_date);
            end_timestamp = e_dt.getTime();
            end_timestamp += day;
            condition = function(card) {
              return ((card.date < end_timestamp) && (card.date > start_timestamp));
            }
          }
        }

        var filtered_cards = [];
        for(var index in cards) {
          var card = cards[index];
          if(condition(card)) {
            filtered_cards.push(card);
          }
        }
        return filtered_cards;
        // var df = parseDate(from);
        // console.log(df);
        // var dt = parseDate(to);
        // console.log(dt);
        // var result = [];        
        // for (var i=0; i<items.length; i++){
        //     var tf = new Date(items[i].date1 * 1000),
        //         tt = new Date(items[i].date2 * 1000);
        //     if (tf > df && tt < dt)  {
        //         result.push(items[i]);
        //     }
        // }         







        // return result;





  };
});