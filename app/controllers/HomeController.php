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

	public function showWelcome() {
		return View::make('hello');
	}

	public function csv() {
		return View::make('csv.index');
	}

	public function csvFileUplaod() {
		return View::make('csv.upload');	
	}

	public function api() {

		$to      = 'adiechahari@gmail.com';
		$subject = 'subject';
		$message = 'hello message';
		$headers = 'From: adiechahari@gmail.com' . "\r\n" .
		    'Reply-To: adiechahari@gmail.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		// $mail = "mail($to, $subject, $message, $headers);";
		$mail = mail($to, $subject, $message, $headers);


		return View::make('api.index', array('mail' => $mail));
	}

	public function email() {

		// $exp = "^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$";
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		$email = "adiechahari@sd.om";

		$validate = FALSE;

		if(preg_match($regex, $email)){
			// if (checkdnsrr(array_pop(explode("@",$email)),"MX")) {
				// $validate = checkdnsrr(array_pop(explode("@",$email)),"MX");
				// $validate = array_pop(explode("@",$email));
				$validate = explode("@",$email);
				$validate = array_pop($validate);
				$validate = checkdnsrr($validate);
			// } else {
			// 	$validate = FALSE;
			// }
		} else {
			$validate = FALSE;
		}    

		// $validate = $this->input->email;

		$data = array('validate' => $validate);
		return View::make('api.email', $data);	
	}

}
