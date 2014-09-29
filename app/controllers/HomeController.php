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
  | Route::get('/', 'HomeController@showWelcome');
  |
  */

  public function showWelcome() {
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

      if($this->customEmailValidatation($email)) {
        array_push($arrValidEmail, $email);
      } else {
        array_push($arrInValidEmail, $email);
      }
    }

    $arr = array('success' => 1,
      'validEmail' => $arrValidEmail,
      'invalidEmail' => $arrInValidEmail);      
        
    echo json_encode($arr);
  }

  private function customEmailValidatation($email, $config = NULL) {
    $default_config = array(
    // phese 1 checks
      'syntax'       => TRUE,
      'de_duplicate' => TRUE, // it should not be duplicated
      'domain_check' => TRUE, // check whether mx record exist or not
      'hr_recipient' => TRUE, // check it's not exist in high-risk recipient list
      'hr_domain'    => TRUE, // check it's not exist in high-risk domains list
      'hr_complain'  => TRUE, // check it's not exist in high-risk complainer list
      'spam_trap'    => TRUE, // check it's not exist in spam trap list
    // phase 2 checks
      'mta-check'    => TRUE, // Mail transfer agent check
      'sm-check'     => TRUE, // Simulated message check
      'bp-check'     => TRUE) // Bounce processing check

    if($config == NULL) {
      $config = $default_config;
    } else {
      $config = array_merge($config, $default_config);
    }

    $validate = TRUE;


    // Syntax check
    if($config['syntax']) {

      $validator = Validator::make(
        array('email' => $email),
        array('email' => 'required|email'));

      if ($validator->fails()) {
        $validate = FALSE;
      } else {
        $validate = TRUE && $validate;
      }
    }

    return $validate;
  }
}
