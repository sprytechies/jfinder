<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * @var User $user user model that we will get by email
     */
    public $user;
    const ERROR_EMAIL_INVALID=3;
    const ERROR_STATUS_NOTACTIV=4;
    const ERROR_STATUS_BAN=5;
    const ERROR_USER_INVALID = 6;
    public function __construct($username,$password=null)
    {
        
        // sets username and password values
        parent::__construct($username,$password);
        
        $this->user = Users::model()->find('LOWER(email)=?',array(strtolower($this->username)));
	if ($this->user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif($this->user->type==2){
            $this->errorCode = self::ERROR_USER_INVALID;
        }
        elseif($password === null)
        {
            
            /**
             * you can set here states for user logged in with oauth if you need
             * you can also use hoauthAfterLogin()
             * @link https://github.com/SleepWalker/hoauth/wiki/Callbacks
             */
            $this->beforeAuthentication();
            $this->errorCode=self::ERROR_NONE;
        }
    }

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() 
    {
        
        if($this->errorCode === self::ERROR_UNKNOWN_IDENTITY)
        {
            if ($this->user->password!=md5($this->password))
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            else 
            {
		$this->beforeAuthentication();
                $this->errorCode = self::ERROR_NONE;    
            }
        }
        
        
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->user->idusers;
    }

    public function getName()
    {
        return $this->user->email;
    }

    public function beforeAuthentication()
    {
        //do before authenctiation work
    }
    
    /**
     * Check this user is company user or not
     * If company user then return false
     */
    public function isCompanyUser($idusers){
        $isExists = CompanyUsers::model()->exists(array('idusers'=>$idusers));
        return $isExists;
    }
}
