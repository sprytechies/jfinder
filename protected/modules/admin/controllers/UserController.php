<?php

class UserController extends AdminController
{
        public function actionIndex()
	{
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index'), 'active' => true),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
	$model= new Users('searchNormal_User');
        $model->unsetAttributes();
       
        if (isset($_GET['Users'])) {
            $model->setAttributes($_GET['Users']);
           }
	$this->render('index',array('model'=>$model));
	}
        public function actionCreate() {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index'), 'active' => true),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
		$model = new Users;
                if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        /*print_r($model->attributes);
                        die();*/
                        $model->status = $_POST['Users']['status'];
                        $model->type = 1; 
                        $model->activkey=AdminModule::encrypting(microtime().$model->password);
                        // saving username : 'xyz' according to email xyz@gmail.com
                       $username = explode('@', $model->email);
                       $model->username = $username[0];
                       
                        
                        if($model->validate())
                        {
                        $model->password= AdminModule::encrypting($model->password);
                        $model->cpassword=AdminModule::encrypting($model->cpassword);
                        

			if ($model->save()) {
                            
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('index', 'id' => $model->idusers));
			}
                        }
		}
                $this->render('create', array( 'model' => $model));
	}
        public function actionUpdate() {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index'), 'active' => true),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
            $id=$_GET['idusers'];
		$model = Users::model()->findByPk($id);
                if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        $model->status = $_POST['Users']['status'];
                        $model->type = 1;
                        $model->cpassword=$model->password;
                        // saving username : 'xyz' according to email xyz@gmail.com
                        $username = explode('@', $model->email);
                        //$model->password=AdminModule::encrypting($model->password);
                        //$model->cpassword=AdminModule::encrypting($model->cpassword);
                        $model->username = $username[0];
                        if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('index', 'id' => $model->idusers));
			}
		}

		$this->render('update', array('model' => $model,));
	}
        public function actionDelete($id) {
            
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			 $model=Users::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        
        public function actionComp_user()
        {
        $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user'), 'active' => true),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
	$model= new Users('searchComp_User');       
        $model->unsetAttributes();
       
        if (isset($_GET['Users'])) {
            $model->setAttributes($_GET['Users']);
           }
        $this->render('comp_user',array('model'=>$model));
    }
    public function actionCreate_compUser() {
        $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user'), 'active' => true),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
		$model = new Users;
                if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        $model->status = $_POST['Users']['status'];
                        $model->type = 2; 
                        $model->activkey=AdminModule::encrypting(microtime().$model->password);
                        // saving username : 'xyz' according to email xyz@gmail.com
                        $username = explode('@', $model->email);
                        
                        $model->username = $username[0];

			if($model->validate())
                        {
                        $model->password=AdminModule::encrypting($model->password);
                        $model->cpassword=AdminModule::encrypting($model->cpassword);
                        
                        if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('comp_user', 'id' => $model->idusers));
			}
                        }
		}
                $this->render('create', array( 'model' => $model));
	}
        public function actionUpdate_compUser() {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user'), 'active' => true),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
            $id=$_GET['idusers'];
		$model = Users::model()->findByPk($id);
                if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        $model->status = $_POST['Users']['status'];
                        $model->type = 2;
                        $model->cpassword=$model->password;
                        // saving username : 'xyz' according to email xyz@gmail.com
                        $username = explode('@', $model->email);
                        $model->username = $username[0];

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('comp_user', 'id' => $model->idusers));
			}
		}

		$this->render('update', array('model' => $model,));
	}
        public function actionDelete_User($id) {
            
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			 $model=Users::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionUser_profile()
    {
        $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile'), 'active' => true),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
	$model= new UserProfile('search');
        $model->unsetAttributes();
        if (isset($_GET['UserProfile'])) {
        $model->attributes = $_GET['UserProfile'];
        }
        $this->render('user_profile',array('model'=>$model));
        }
        public function actionCreate_profile() {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile'), 'active' => true),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
            
		$model = new UserProfile;
                if (isset($_POST['UserProfile'])) {
			$model->setAttributes($_POST['UserProfile']);
                        if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('user_profile', 'id' => $model->iduser_profile));
			}
		}
                $this->render('create_profile', array( 'model' => $model));
	}
        public function actionUpdate_profile(){
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile'), 'active' => true),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
            //die();
            $id=$_GET['iduser_profile'];
          $model= UserProfile::model()->findByPk($id);


		if (isset($_POST['UserProfile'])) {
			$model->setAttributes($_POST['UserProfile']);

			if ($model->save()) {
				$this->redirect(array('user_profile', 'id' => $model->idusers));
			}
		}

		$this->render('update_profile', array('model' => $model));
                
         }
         public function actionDelete_profile() {
             $id=$_GET['iduser_profile'];
            if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model=UserProfile::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionUser_exp()
	{
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp'), 'active' => true),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
	$model= new UserExp();
        $model->unsetAttributes();
        if (isset($_GET['UserExp'])) {
            $model->attributes = $_GET['UserExp'];
        }
        
		$this->render('user_exp',array('model'=>$model));
	}
        public function actionCreate_exp() {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp'), 'active' => true),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
		$model = new UserExp;
                if (isset($_POST['UserExp'])) {
			$model->setAttributes($_POST['UserExp']);
                        
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('user_exp', 'id' => $model->idexp));
			}
		}

		$this->render('create_exp', array( 'model' => $model));
	}
        public function actionUpdate_exp(){
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp'), 'active' => true),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
          $id=$_GET['idexp'];
          $model = new UserExp;
          $model= UserExp::model()->findByPk($id);
          if (isset($_POST['UserExp'])) {
		$model->setAttributes($_POST['UserExp']);
                if ($model->save()) {
			$this->redirect(array('user_exp', 'id' => $model->idexp));
		}
            }
            $this->render('update_exp', array('model' => $model));            
        }
        public function actionDelete_exp() {
            $id=$_GET['idexp'];
            if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model=  UserExp::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionUser_meta()
	{
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta'), 'active' => true),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
	$model= new UserMeta();
        $model->unsetAttributes();
        if (isset($_GET['UserMeta'])) {
            $model->attributes = $_GET['UserMeta'];
        }
        $this->render('user_meta',array('model'=>$model));
	}
         
        public function actionCreate_meta()
            {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta'), 'active' => true),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
                $model=new UserMeta;
                if(isset($_POST['UserMeta']))
                {
                    $model->attributes=$_POST['UserMeta'];
                    if($model->validate())
                    {
                         if (isset($_POST['UserMeta'])) {
			$model->setAttributes($_POST['UserMeta']);
                        
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('user_meta', 'id' => $model->idusermeta));
                                 }
                           }
                    }
                
                } 
                $this->render('create_meta',array('model'=>$model));
            }
            public function actionUpdate_meta(){
                $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta'), 'active' => true),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
                $id=$_GET['idusermeta'];
                $model = new UserMeta;
                $model= UserMeta::model()->findByPk($id);
                if (isset($_POST['UserMeta'])) {
                      $model->setAttributes($_POST['UserMeta']);
                      if ($model->save()) {
                              $this->redirect(array('user_meta', 'id' => $model->idusermeta));
                      }
                  }
                  $this->render('update_meta', array('model' => $model));            
            }
        public function actionDelete_meta() {
            $id=$_GET['idusermeta'];
            if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model=  UserMeta::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('user_meta'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionUser_edu()
	{
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu'), 'active' => true),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
	$model= new UserEdu();
        $model->unsetAttributes();
        if (isset($_GET['UserEdu'])) {
            $model->attributes = $_GET['UserEdu'];
        }
        $this->render('user_edu',array('model'=>$model));
	}
        public function actionCreate_edu() {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu'), 'active' => true),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
		$model = new UserEdu;
                if (isset($_POST['UserEdu'])) {
			$model->setAttributes($_POST['UserEdu']);
                        $model->description=$_POST['UserEdu']['description'];

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('user_edu', 'id' => $model->idedu));
			}
		}

		$this->render('create_edu', array( 'model' => $model));
	}
        public function actionUpdate_edu(){
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu'), 'active' => true),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project')),
	);
          $id=$_GET['idedu'];
          $model = new UserEdu;
          $model= UserEdu::model()->findByPk($id);
          if (isset($_POST['UserEdu'])) {
		$model->setAttributes($_POST['UserEdu']);
                 $model->description=$_POST['UserEdu']['description'];
                if ($model->save()) {
			$this->redirect(array('user_edu', 'id' => $model->idedu));
		}
            }
            $this->render('update_edu', array('model' => $model));            
        }
        public function actionDelete_edu() {
            $id=$_GET['idedu'];
            if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model=  UserEdu::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionUser_project()
	{
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project'), 'active' => true),
	);
	$model= new UserProjects();
        $model->unsetAttributes();
        if (isset($_GET['UserProjects'])) {
            $model->attributes = $_GET['UserProjects'];
        }
	$this->render('user_project',array('model'=>$model));
	}
        public function actionCreate_project() {
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project'), 'active' => true),
	);
		$model = new UserProjects();
                if (isset($_POST['UserProjects'])) {
			$model->setAttributes($_POST['UserProjects']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('user_project'));
			}
		}

		$this->render('create_project', array( 'model' => $model));
	}
        public function actionUpdate_project(){
            $this->adminMenu = array(
            array('label' => 'All user', 'icon' => 'user', 'url' => array('user/index')),
            array('label' => 'All Company User', 'icon' => 'home', 'url' => array('user/comp_user')),
            array('label' => 'User Profile', 'icon' => 'home', 'url' => array('user/user_profile')),
            array('label' => 'User Experience', 'icon' => 'home', 'url' => array('user/user_exp')),
            array('label' => 'User Meta', 'icon' => 'home', 'url' => array('user/user_meta')),
            array('label' => 'User Education', 'icon' => 'home', 'url' => array('user/user_edu')),
            array('label' => 'User Projects', 'icon' => 'home', 'url' => array('user/user_project'), 'active' => true),
	);
          $id=$_GET['idprojects'];
          $model= UserProjects::model()->findByPk($id);
          if (isset($_POST['UserProjects'])) {
		$model->setAttributes($_POST['UserProjects']);
                if ($model->save()) {
			$this->redirect(array('user_project', 'id' => $model->idprojects));
		}
            }
            $this->render('update_project', array('model' => $model));            
        }
        public function actionDelete_project() {
            $id=$_GET['idprojects'];
            if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model= UserProjects::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function loadModel($id,$modelClass )
        {
            $model =CActiveRecord::model($modelClass);
            $model=$model->model()->findByPk($id);
            if($model==null)
                        throw new CHttpException(404,'The requested page does not exist.');
                return $model;
        }
      
}