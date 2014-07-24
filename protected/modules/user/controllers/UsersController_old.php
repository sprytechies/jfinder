<?php

class UsersController extends GxController {

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
		);
	}
        
	public function actionView($id) {
                
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Users'),
		));
	}

	public function actionCreate() {
		$model = new Users;


		if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idusers));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
        
        /**
         * User Registration
         */
        public function actionRegistration() {
                Yii::import('ext.multimodelform.MultiModelForm');
                $this->layout="//layouts/user_column1";
                $users = new Users;
                $userExp = new UserExp;
                $userEdu = new UserEdu;
                $validatedMembersExp = array();  //ensure an empty array
                $validatedMembersEdu = array();  //ensure an empty array
 
		if (isset($_POST['Users'])) {
                        $users->setAttributes($_POST['Users']);
                        $userExp->setAttributes($_POST['UserExp']);
                        $userEdu->setAttributes($_POST['UserEdu']);
                        $users->status = 1;
                        $users->activkey=UserModule::encrypting(microtime().$users->password);
                        
                        // saving username : 'xyz' according to email xyz@gmail.com
                        $username = explode('@', $users->email);
                        $users->username = $username[0];
                        
                        if( 
                            $users->validate() &&    
                            //validate detail before saving the master
                            MultiModelForm::validate($userExp,$validatedMembers,$deleteItems) && 
                            MultiModelForm::validate($userEdu,$validatedMembers,$deleteItems) 
                        )
                        {
                            
                            $users->password=UserModule::encrypting($users->password);
                            $users->cpassword=UserModule::encrypting($users->cpassword);
                            if ($users->save()) {
                                $masterValuesExp = array ('idusers'=>$users->idusers);
                                $masterValuesEdu = array ('idusers'=>$users->idusers);
                                MultiModelForm::save($userExp,$validatedMembersExp,$deleteMembers,$masterValuesExp);
                                MultiModelForm::save($userEdu,$validatedMembersEdu,$deleteMembers,$masterValuesEdu);
                                
                                // Auto Login after registration
                                $identity=new UserIdentity($users->username,$users->password);
                                $identity->authenticate();
                                Yii::app()->user->login($identity,0);
                                
                                if (Yii::app()->getRequest()->getIsAjaxRequest())
                                        Yii::app()->end();
                                else
                                        $this->redirect(array('view', 'id' => $users->idusers));
                            }
                        } else{
                            $userExp->validate();
                            $userEdu->validate();
                        }
		}
                $this->render('registration', array( 'users' => $users,'userExp'=>$userExp, 'userEdu'=>$userEdu, 'validatedMembersExp'=>$validatedMembersExp, 'validatedMembersEdu'=>$validatedMembersEdu));
	}
        
        /**
         * User Registration
         */
        public function actionProfile() {
		$model = new Users;


		if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        $model->status = 1;
                        $model->activkey=UserModule::encrypting(microtime().$model->password);
                        $model->cdate=time();
                        $model->mdate=time();
                        $model->password=UserModule::encrypting($model->password);
			$model->cpassword=UserModule::encrypting($model->cpassword);
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idusers));
			}
		}

		$this->render('profile', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Users');


		if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idusers));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Users')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Users');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Users('search');
		$model->unsetAttributes();

		if (isset($_GET['Users']))
			$model->setAttributes($_GET['Users']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}