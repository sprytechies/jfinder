<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Loginwith
 *
 * @author sprytechies
 */

class Loginwith extends Users
{
	public function rules()
	{
		return array(
			// username and password are required
			array('email', 'required'),
			// rememberMe needs to be a boolean
			// password needs to be authenticated
		);
	}
        
//        public function __construct()
//        {
//              $this->setLinkedInProfile();
//        }
        
        public static function setLinkedInProfile(){
            
            $config=Yii::app()->basePath.'/config/hoauth.php';
            $hoauth = Yii::app()->basePath.'/extensions/hoauth/hybridauth/Hybrid/Auth.php';

            require_once($hoauth);
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth( $config );
            // try to authenticate the user with linkedin,
            // user will be redirected to linkedin for authentication,
            // if he already did, then Hybridauth will ignore this step and return an instance of the adapter
            $linkedin = $hybridauth->authenticate( "LinkedIn" );
            
            // get the user profile
            $linkedin_user_profile = $linkedin->getUserProfile();
                
            $userId = Loginwith::createUser($linkedin_user_profile);
            Loginwith::createEdu($linkedin_user_profile, $userId);
            Loginwith::createExu($linkedin_user_profile, $userId);
            //$this->createProfile($linkedin_user_profile, $userId);
    
        }
        
        /**
         * Set a random password
         */
        public static function rand_password( $length ) {

            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return substr(str_shuffle($chars),0,$length);

        }
        
        public function behaviors(){
                return array(
                        'CTimestampBehavior' => array(
                                'class' => 'zii.behaviors.CTimestampBehavior',
                                'createAttribute' => 'cdate',
                                'updateAttribute' => 'mdate',
                        )
                );
        }
        
        public static function createUser($linkedin_user_profile){
            $user = Users::model()->findByPk(Yii::app()->user->id);
            
            $user->email = $linkedin_user_profile->email;
            $randomPass = Loginwith::rand_password(8);
            $user->password =$randomPass;
            $user->activkey=md5(microtime().$user->password);
            $user->status = 1;
            $user->save(false);
            return $user->idusers;
        }
        
        public static function createEdu($linkedin_user_profile,$userId){
                $profiles = array_slice($linkedin_user_profile->educations,1);
                foreach($profiles as $profile){
                   foreach ($profile as $record) {
                      // $year = $record['end-date']['year'];
                           
            
                        if(is_array($record) && !empty($record)){
                            $user_edu = new UserEdu;
                            $user_edu->idusers = $userId;
                            $user_edu->name = isset($record['school-name'])?$record['school-name']:null;
                            $user_edu->degree = isset($record['degree'])?$record['degree']:null;
                           // $user_edu->completed = $year;
                            if(isset($record['is-current']))
                                $user_edu->ongoing = 1;
                            else
                                $user_edu->ongoing = 0;
                            $user_edu->save(false);
                        }
                    }
                }
                
            
        }
        
        public static function createExu($linkedin_user_profile,$userId){
             $profiles = array_slice($linkedin_user_profile->positions,1);
             foreach($profiles as $profile){
                foreach ($profile as $record) {
                       if(is_array($record)){
                            $user_exp = new UserExp;
                            $user_exp->idusers = $userId;
                            $user_exp->company = isset($record['company']['name'])?$record['company']['name']:null;
                            $user_exp->name = isset($record['title'])?$record['title']:null;
                            $user_exp->from = isset($record['start-date']['year'])?$record['start-date']['year'].$record['start-date']['month']:null;
                            if($record['is-current'])
                                $user_exp->ongoing = 1;
                            else{
                                $user_exp->ongoing = 0;
                                $user_exp->to = isset($record['end-date']['month'])?$record['end-date']['month']."-".$record['end-date']['year']:null;
                            }


                            $user_exp->save(false);
                       }
                }
             }
            
        }
        
        public static function createProfile($linkedin_user_profile,$userId){
            foreach ($linkedin_user_profile->positions->position as $record) {
                    $user_exp = new UserExp;
                    $user_exp->idusers = $userId;
                    $user_exp->company = $record->company->name;
                    $user_exp->name = $record->title;
                    $user_exp->from = $record->{'start-date'};
                    if($record->{'is-current'})
                        $user_exp->ongoing = 1;
                    else{
                        $user_exp->ongoing = 0;
                        $user_exp->to = $record->{'end-date'}->month."-".$record->{'end-date'}->year;
                    }
                    $user_exp->save(false);
            }
        }
}
