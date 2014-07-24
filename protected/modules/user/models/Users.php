<?php

Yii::import('application.modules.user.models._base.BaseUsers');

class Users extends BaseUsers
{
	public $cpassword;
        public $verifyCode;
        public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        public function rules() {
		return array(
			array('email,password,cpassword', 'required'),
			array('cpassword', 'compare', 'compareAttribute'=>'password', 'message' => "Password is not equal"),
			array('email', 'email'),
			array('email', 'unique', 'message' => "This email already exists."),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => "Incorrect password (minimal length 4 symbols)."),
		);
	}
        public function attributeLabels() {
		return array(
			'cpassword' => Yii::t('app', 'Confirm Password'),
		);
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
        /**
        * Returns User model by its email
        * 
        * @param string $email 
        * @access public
        * @return User //used by hoauth 
        */
       public function findByEmail($email)
       {
           return self::model()->findByAttributes(array('email' => $email));
       }
       
       /**
         * Send mail by Yii Mailer Ext
         */
        public function sendMail($to,$from,$fromName,$subject,$message){
            Yii::app()->mailer->IsSMTP();
            Yii::app()->mailer->From = $from;
            Yii::app()->mailer->FromName = $fromName;
            Yii::app()->mailer->AddReplyTo($from);
            Yii::app()->mailer->AddAddress($to);
            Yii::app()->mailer->Subject = $subject;
            Yii::app()->mailer->Body = $message;
            Yii::app()->mailer->Send();
        }

}