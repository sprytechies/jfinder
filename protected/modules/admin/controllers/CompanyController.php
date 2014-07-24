<?php

class CompanyController extends AdminController
{
	public function actionIndex()
	{
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index'), 'active' => true),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'),),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'),),
        );
	$model= new Companies();
        if (isset($_GET['Companies'])) {
            $model->attributes = $_GET['Companies'];
        }
	$this->render('index' , array('model'=>$model));
	}
        public function actionCreate() {
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index'), 'active' => true),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'),),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'),),
        );
		//Yii::app()->theme='bluefields_company';
		$model = new Companies;


		if (isset($_POST['Companies'])) {
			$model->setAttributes($_POST['Companies']);
                        

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('index', 'id' => $model->idcompanies));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate() {
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index'), 'active' => true),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'),),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'),),
        );
                $id=$_GET['idcompanies'];
		$model = $this->loadModel($id, 'Companies');


		if (isset($_POST['Companies'])) {
			$model->setAttributes($_POST['Companies']);
                        
			if ($model->save()) {
				$this->redirect(array('index', 'id' => $model->idcompanies));
			}
		}

		$this->render('update', array('model' => $model,));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Companies')->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionCompany_meta()
	{
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index')),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'), 'active' => true),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'),),
        );
	$model= new CompanyMeta();
        $model->unsetAttributes();
        if (isset($_GET['CompanyMeta'])) {
            $model->attributes = $_GET['CompanyMeta'];
        }
        
	$this->render('company_meta' , array('model'=>$model));
	}
        public function actionCreate_meta()
        {
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index')),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'), 'active' => true),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'),),
        );
            $model=new CompanyMeta;

            if(isset($_POST['CompanyMeta']))
            {
                $model->attributes=$_POST['CompanyMeta'];
                if($model->validate())
                {
                    if ($model->save()) {
                                        if (Yii::app()->getRequest()->getIsAjaxRequest())
                                                Yii::app()->end();
                                        else
                                                $this->redirect(array('company_meta', 'id' => $model->idcompanymeta));
                                }
                }
            }
            $this->render('create_meta',array('model'=>$model));
        }
        public function actionUpdate_meta() {
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index')),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'), 'active' => true),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'),),
        );
                $id=$_GET['idcompanymeta'];
		$model = $this->loadModel($id, 'CompanyMeta');


		if (isset($_POST['CompanyMeta'])) {
			$model->setAttributes($_POST['CompanyMeta']);

			if ($model->save()) {
				$this->redirect(array('company_meta', 'id' => $model->idcompanymeta));
			}
		}

		$this->render('update_meta', array('model' => $model,));
	}
        public function actionDelete_meta() {
            $id=$_GET['idcompanymeta'];
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'CompanyMeta')->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionCompany_user()
	{
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index'),),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'),),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'), 'active' => true),
        );
	$model= new Users('searchComp_User');
        if (isset($_GET['Users'])) {
            $model->attributes = $_GET['Users'];
        }
        
        
        $this->render('company_user',array('model'=>$model));
	}
        
        public function loadModel($id,$modelClass )
        {
            $model =CActiveRecord::model($modelClass);
            
                $model= $model->model()->findByPk($id);
                if($model===null)
                        throw new CHttpException(404,'The requested page doe not exist.');
                return $model;
        }
        public function actionCreate_user() {
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index'),),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'),),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'), 'active' => true),
        );
		$model = new Users;
                $model_compUser =new CompanyUsers;
                if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        $model->status=$_POST['Users']['status'];
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
                            $model_compUser->setAttributes($_POST['CompanyUsers']);
                            $model_compUser->idusers = $model->idusers;
                            if ($model_compUser->save()){
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('company_user', 'id' => $model->idusers));
                                }
                            }
                            
                         }
		}
                $this->render('create_user', array( 'model' => $model,'model_compUser'=>$model_compUser));
	}
        public function actionUpdate_user() {
            $this->adminMenu = array(
            array('label' => 'All Companies', 'icon' => 'home', 'url' => array('company/index'),),
            array('label' => 'Company Meta', 'icon' => 'user', 'url' => array('company/company_meta'),),
	    array('label' => 'Company User', 'icon' => 'user', 'url' => array('company/company_user'), 'active' => true),
        );
            $id=$_GET['idusers'];
		$model = Users::model()->findByPk($id);
               
                if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        $model->status=$_POST['Users']['status'];
                        $model->type = 2; 
                        $model->activkey=AdminModule::encrypting(microtime().$model->password);
                        // saving username : 'xyz' according to email xyz@gmail.com
                        $username = explode('@', $model->email);
                        $model->username = $username[0];
                        $model->cpassword=$model->password;

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('company_user', 'id' => $model->idusers));
			}
		}

		$this->render('update_user', array('model' => $model));
	}
        public function actionDelete_user() {
            $id=$_GET['idusers'];
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			 $model=Users::model()->findByPk($id)->delete();
                        if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
}