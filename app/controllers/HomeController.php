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

	public function validateEmail($email) {

    $arrEmail = explode(",", $email);
    
    $arrInValidEmail = array();
    $arrValidEmail = array();
    
    foreach($arrEmail as $email) {

    	$result = $this->customEmailValidatation($email);
    	
      if($result['isValid']) {
        array_push($arrValidEmail, $email);
        
      DB::table('tbl_user')->insert(
    	array(
    	'email' => $email, 
    	'email_status' => 1,
    	'time_of_validation' => date('Y-m-d H:i:s')
    	)
	);
        
      }

      else {
        array_push($arrInValidEmail, $email);
        
      DB::table('tbl_user')->insert(
    	array(
    	'email' => $email, 
    	'email_status' => 0,
    	'time_of_validation' => date('Y-m-d H:i:s'),
    	'email_status_remark' => $result['reason']
    	)
	);
      }
      
   
      
    }

    $arr = array(
      'success' => 1,
      'validEmail' => $arrValidEmail,
      'invalidEmail' => $arrInValidEmail
    );      
        
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
      'hr_role' 	 => TRUE, // check it's not exist in high-risk role list
      'hr_throwaway' => TRUE, // check it's not exist in high-risk throwaway list
      'spam_trap'    => TRUE, // check it's not exist in spam trap list

    // phase 2 checks
      'mta-check'    => TRUE, // Mail transfer agent check
      'sm-check'     => TRUE, // Simulated message check
      'bp-check'     => TRUE
    ); // Bounce processing check

    if($config == NULL) {
      $config = $default_config;
    } else {
      $config = array_merge($config, $default_config);
    }

    $validate = TRUE;
    $reason ='';

    // Syntax check
    if($config['syntax']) {

      $validator = Validator::make(
        array('email' => $email),
        array('email' => 'required|email'));

      if ($validator->fails()) {
        $validate = FALSE;
        $reason = 'syntax';
      } 
      
      else {
        $validate = TRUE && $validate;
      }
    }
    
    
    //duplicate check
    if($config['de_duplicate']) {
     	
     $result = DB::table('tbl_user')
    	->where('email', '=', $email)
    	->first();

	if (is_null($result)) {
	    // It does not exist - 
	    $validate = TRUE && $validate;
	} else {
	    // It exists - 
	     $validate = FALSE;
	     $reason = 'de_duplicate';
	}
     	
  }
    

  //hr_recipient check
    if($config['hr_recipient']) {
     	
     $recipient = explode('@', $email);	
     $result = DB::table('high-risk-profanity')
    	->where('recipient', 'LIKE', '%'.$recipient[0].'%')
    	->first();

	if (is_null($result)) {
	    // It does not exist - 
	    $validate = TRUE && $validate;
	} else {
	    // It exists - 
	     $validate = FALSE;
	     $reason = 'hr_recipient';
	}
     	
  }
  
  
  //hr_domain check
   if($config['hr_domain']) {
     $recipient = explode('@', $email);	
     $result = DB::table('high-risk-mobiledomains')
    	->where('domain', 'LIKE', '%'.$recipient[1].'%')
    	->first();

	if (is_null($result)) {
	    // It does not exist - 
	    $validate = TRUE && $validate;
	} else {
	    // It exists - 
	     $validate = FALSE;
	     $reason = 'hr_domain';
	}
     	
  }
  
  
  //high-risk-complainers check
   if($config['hr_complain']) {
     $result = DB::table('high-risk-complainers')
    	->where('email', '=', $email)
    	->first();

	if (is_null($result)) {
	    // It does not exist - 
	    $validate = TRUE && $validate;
	} else {
	    // It exists - 
	     $validate = FALSE;
	     $reason = 'hr_complain';
	}
     	
  }
    
    //hr_throwaway check
  if($config['hr_throwaway']) {
  	 $recipient = explode('@', $email);
     $result = DB::table('high-risk-throwaway')
    	->where('standard', 'LIKE', '%'.$recipient[1].'%')
    	->first();

	if (is_null($result)) {
	    // It does not exist - 
	    $validate = TRUE && $validate;
	} else {
	    // It exists - 
	     $validate = FALSE;
	     $reason = 'hr_throwaway';
	}
     	
  }
  
  //hr_role check
   if($config['hr_role']) {
     $recipient = explode('@', $email);
     $result = DB::table('high-risk-roles')
    	->where('role', 'LIKE', '%'.$recipient[0].'%')
    	->first();

	if (is_null($result)) {
	    // It does not exist - 
	    $validate = TRUE && $validate;
	} else {
	    // It exists - 
	     $validate = FALSE;
	     $reason = 'hr_role';
	}
     	
  }
    
    
    //spam_trap check
     if($config['spam_trap']) {
     	
     $result = DB::table('high-risk-spamtraps')
    	->where('spamtrap', '=', $email)
    	->first();

	if (is_null($result)) {
	    // It does not exist - 
	    $validate = TRUE && $validate;
	} else {
	    // It exists - 
	     $validate = FALSE;
	     $reason = 'spam_trap';
	}
     	
  }
    

    return array(
    		'isValid' => $validate,
    		'reason' => $reason
    	);
  }
}
