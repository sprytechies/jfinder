<?php

class SiteController extends Controller
{
	
         public function filters()
    	{
    		return array(
                        'accessControl', 
                        'postOnly + delete',
                );
    	}
  	public function accessRules()
        {
            return array(
                array('allow', // allow all users to perform 'index' and 'view' actions
                    'actions' => array('index','error','captcha','oauth','logout','linkedinChangePass'),
                    'users' => array('*'),
                ),
                array('allow', // allow all users to perform 'index' and 'view' actions
                    'actions' => array('isOnline'),
                    'users' => array('@'),
                ),
                array('deny', // deny all users
                    'users' => array('*'),
                ),
//
            );
       }
        /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
                        'oauth' => array(
                            // the list of additional properties of this action is below
                            'class'=>'ext.hoauth.HOAuthAction',
                            // Yii alias for your user's model, or simply class name, when it already on yii's import path
                            // default value of this property is: User
                            'model' => 'Loginwith', 
                            // map model attributes to attributes of user's social profile
                            // model attribute => profile attribute
                            // the list of avaible attributes is below
                            'attributes' => array(
                              'email' => 'email',
                            ),
                        ),
                        // this is an admin action that will help you to configure HybridAuth 
                        // (you must delete this action, when you'll be ready with configuration, or 
                        // specify rules for admin role. User shouldn't have access to this action!)
                        'oauthadmin' => array(
                            'class'=>'ext.hoauth.HOAuthAdminAction',
                        ),
                        'upload'=>array(
                            'class'=>'xupload.actions.XUploadAction',
                            'path' =>Yii::app() -> getBasePath() . "/../uploads",
                            'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
                        ),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
                if(!Yii::app()->user->isGuest){
                    
                       $user = Users::model()->findByPk(Yii::app()->user->id);
                        if($user->username!=Null)
                            $this->redirect(Yii::app()->createUrl('user/dashboard'));
                        else{
                            $this->redirect(Yii::app()->createUrl('user/users/ChangePassword'));
                        }
                }
                $profile = null;
                	                
                $this->layout="//layouts/user_column1";
		$this->render('index',array('profile'=>$profile));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
                //$user = UserOnline::model()->findByAttributes(array('idusers'=>Yii::app()->user->id));
                //$user->last_activity = Null;
                //$user->save();
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        /**
         * Change password just after logged in with linkedIn
         */
        public function actionLinkedinChangePass()
	{
            $model = new Users;
            if(isset($_POST['Users'])){
                $model->password = $_POST['Users']['password'];
                $model->cpassword = $_POST['Users']['cpassword'];
                if($model->validate()){
                    $user = Users::model()->find('email="'.Yii::app()->user->id.'"');
                    $user->password = md5($model->password);
                    if($user->save(false)){
                        $this->redirect(Yii::app()->getBaseUrl('user/dashboard/index'));
                    }
                    else
                        echo "not save";die;
                    $this->redirect(Yii::app()->getBaseUrl('user/users/dashboard'));
                }	
            }
            $this->render('changePassword',array('model'=>$model));
	}
        
        /**
         * If user don't want to change password after logged in with linkedin
         */
//        public function actionChangeLater()
//	{
//            $user = Users::model()->findByPk(Yii::app()->user->id);
//            $to = $user->email;
//            $subject = "Welcome to JFinder";
//            $message = "Hello,<br><br>";
//            $message .= "Your Registration with JFinder is successfull.<br>";
//            $message .= "Your Login Details are :<br>";
//            $message .= "Email : ".$user->email."<br>";
//            $message .= "Password : ".$user->password."<br>";
//            
//            Users::model()->sendMail($to,$from,$fromName,$subject,$message);
//                    
//	}
        
        
        
        
        
}