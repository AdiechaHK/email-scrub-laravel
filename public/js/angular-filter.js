angular.module('email').filter("daterange", function() {
  return function(cards, start_date, end_date) {

        var day = 1000 * 60 * 60 * 24;
        var condition ;
        var e_dt, s_dt;
        // console.log(start_date,end_date)
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
  };
});