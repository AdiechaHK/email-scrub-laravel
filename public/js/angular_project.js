//Define an angular module for our app
var emailApp = angular.module('email', ['angularFileUpload','ngBootstrap']);

// config to change start end end symbol for angular template
emailApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%').endSymbol('%>');
});