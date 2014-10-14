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

  public function api() {
    return View::make('api.help');
  }

  public function csv() {
    return View::make('csv.form');
  }
  
   public function design() {
        return View::make('design');
     }
	 
	    public function report() {
        return View::make('report');
     }

  public function submitCsv() {

    echo "Right place. ";


    if (Input::hasFile('csv'))
    {
      $csv_file = Input::file('csv');
      if ($csv_file->isValid())
      {
        $path = public_path() . "/data/";
        $file_name = str_random(8) . "_" . $csv_file->getClientOriginalName();
        $uploadStatus = $csv_file->move($path, $file_name);
        echo ($uploadStatus) ? "Success": "Fail";
      } else {
        echo "file is invalid. ";
      }
    } else {
      echo "file namely 'csv' not found. ";
    }
  }

  public function validateEmail($email) {

    $arrEmail = explode(",", $email);
    
    $arrInValidEmail = array();
    $arrValidEmail = array();
    
    foreach($arrEmail as $email) {

      $email = trim($email);
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
        array_push($arrInValidEmail, array('email'=>$email, 'reason'=> $result['reason']));
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
      'success' => TRUE,
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
      'hr_role' 	   => TRUE, // check it's not exist in high-risk role list
      'hr_throwaway' => TRUE, // check it's not exist in high-risk throwaway list
      'spam_trap'    => TRUE, // check it's not exist in spam trap list

    // phase 2 checks
      'mta-check'    => TRUE, // Mail transfer agent check
      'sm-check'     => TRUE, // Simulated message check
      'bp-check'     => TRUE  // Bounce processing check
    );

    // setting up configuration
    if($config == NULL) {
      $config = $default_config;
    } else {
      $config = array_merge($config, $default_config);
    }

    // initialize values;
    $validate = TRUE;
    $reason = '';
    $valid = array();

    // Syntax check
    if($config['syntax']) {

      $validator = Validator::make(
        array('email' => $email),
        array('email' => 'required|email'));

      if ($validator->fails()) {
        $validate = FALSE;
        $reason = 'syntax';
        $valid['syntaxCheck'] = FALSE;
      } 
      
      else {
        $validate = TRUE && $validate;
        $valid['syntaxCheck'] = TRUE;
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
        $valid['duplicateCheck'] = TRUE;
      } else {
        // It exists - 
        $validate = FALSE;
        $reason = 'duplicate entry';
        $valid['duplicateCheck'] = FALSE;
      }
    }

    // high risk recipient check
    if($config['hr_recipient']) {

      $recipient = explode('@', $email);	
      $result = DB::table('high-risk-profanity')
        ->where('recipient', '=', $recipient[0])
        ->first();

      if (is_null($result)) {
  	    // It does not exist - 
        $validate = TRUE && $validate;
        $valid['highRiskRecipientCheck'] = TRUE;
      } else {
        // It exists - 
        $validate = FALSE;
        $reason = 'high risk recipient';
        $valid['highRiskRecipientCheck'] = FALSE;
      }
    }


    //hr_domain check
    if($config['hr_domain']) {
      $recipient = explode('@', $email);	
      if(isset($recipient[1])) {
        $result = DB::table('high-risk-mobiledomains')
          // ->where('domain', 'LIKE', '%'.$recipient[1].'%')
          ->where('domain', '=', $recipient[1])
          ->first();

        if (is_null($result)) {
          // It does not exist - 
          $validate = TRUE && $validate;
          $valid['highRiskDomainCheck'] = TRUE;
        } else {
          // It exists - 
          $validate = FALSE;
          $reason = 'high risk domain';
          $valid['highRiskDomainCheck'] = FALSE;
        }
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
        $valid['highRiskComplainerCheck'] = TRUE;
      } else {
        // It exists - 
        $validate = FALSE;
        $reason = 'high risk complain';
        $valid['highRiskComplainerCheck'] = FALSE;
      }
    }

    //hr_throwaway check
    if($config['hr_throwaway']) {
      $recipient = explode('@', $email);
      if(isset($recipient[1])) {

        $result = DB::table('high-risk-throwaway')
          ->where('standard', '=', $recipient[1])
          ->first();

        if (is_null($result)) {
          // It does not exist - 
          $validate = TRUE && $validate;
          $valid['highRiskThrowawayCheck'] = TRUE;
        } else {
          // It exists - 
          $validate = FALSE;
          $reason = 'high risk throwaway';
          $valid['highRiskThrowawayCheck'] = FALSE;
        }
      }
    }

    //hr_role check
    if($config['hr_role']) {
      $recipient = explode('@', $email);
      $result = DB::table('high-risk-roles')
        ->where('role', '=', $recipient[0])
        ->first();

      if (is_null($result)) {
        // It does not exist - 
        $validate = TRUE && $validate;
        $valid['highRiskRoleCheck'] = TRUE;
      } else {
        // It exists - 
        $validate = FALSE;
        $reason = 'high risk roles';
        $valid['highRiskRoleCheck'] = FALSE;
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
        $valid['spamtrapCheck'] = TRUE;
      } else {
        // It exists - 
        $validate = FALSE;
        $reason = 'high risk spamtrap';
        $valid['spamtrapCheck'] = FALSE;
      }
    }


    return array(
      'isValid' => $validate,
      'reason' => $valid);
  }
}
