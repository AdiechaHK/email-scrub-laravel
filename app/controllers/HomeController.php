<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function csv() {
		return View::make('csv.index');
	}

	
	public function validateEmail($email) {
		$arrEmail = explode(",", $email);
		
		$arrInValidEmail = array();
		$arrValidEmail = array();
		
	foreach($arrEmail as $email) {

		$validator = Validator::make(
    	
		array(
      	  'email' => $email
   		 ),
   		
   		 array(
           'email' => 'required|email'
    	)
	);
	
		if ($validator->fails())
		{
	    // The given data did not pass validation
	      	array_push($arrInValidEmail, $email);		
	 	}
		else
		{
	      	array_push($arrValidEmail, $email);		
		}
  	  }
	
	$arr = array('success' => 1, 
				'validEmail' => $arrValidEmail,
				'invalidEmail' => $arrInValidEmail	
				);      
				
	echo json_encode( $arr );
 }
}
