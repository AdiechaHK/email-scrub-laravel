//Define an angular module for our app
var emailApp = angular.module('email', ['nvd3ChartDirectives']);

// config to change start end end symbol for angular template
emailApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%').endSymbol('%>');
});