<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserIdentity
 *
 * @author sprytechies
 */
class UserIdentity extends CUserIdentity{
    public $_id;
    const ERROR_USER_INVALID = 6;
    const ERROR_EMAIL_INVALID = 1;
    //put your code here
    public function authenticate()
	{
	
        
		if (strpos($this->username,"@")) {
			$user=Users::model()->findByAttributes(array('email'=>$this->username));
		} else {
			$user=Users::model()->findByAttributes(array('username'=>$this->username));
		}
                if($user===null)
			if (strpos($this->username,"@")) {
				$this->errorCode=self::ERROR_EMAIL_INVALID;
			} else {
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
                elseif($user->type!=2)
                        $this->errorCode = self::ERROR_USER_INVALID;
                else if(md5($this->password)!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if($user->status==0&&Yii::app()->controller->module->loginNotActiv==false)
			$this->errorCode=self::ERROR_STATUS_NOTACTIV;
		else if($user->status==-1)
			$this->errorCode=self::ERROR_STATUS_BAN;
		else {
			$this->_id=$user->idusers;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	 public function getId()
	{
		return $this->_id;
	}
}

