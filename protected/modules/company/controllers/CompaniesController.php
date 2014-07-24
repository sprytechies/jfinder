<?php

class CompaniesController extends GxController {
   
/** 
>>multiple themes
*/
    
//	public function init() {  
//		if(Yii::app()->user->isGuest)
//		Yii::app()->theme = 'user';
//		 else
//		Yii::app()->theme = 'company';
//		parent::init();
//        }


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Companies'),
		));
	}
	
	public function actionCreate() {
		Yii::app()->theme='bluefields_company';
		$model = new Companies;


		if (isset($_POST['Companies'])) {
			$model->setAttributes($_POST['Companies']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idcompanies));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Companies');


		if (isset($_POST['Companies'])) {
			$model->setAttributes($_POST['Companies']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idcompanies));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Companies')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Companies');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Companies('search');
		$model->unsetAttributes();

		if (isset($_GET['Companies']))
			$model->setAttributes($_GET['Companies']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionCompanyView() {
		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column1";
		$this->render('companyview');
	}
	
	
	public function actionCompanyPage() {
		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column2";
		$this->render('companypage');
	}
	
	public function actionRegistration() {
		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column1";
		$users = new Users;
		$companies = new Companies;
		$companyUser = new CompanyUsers;
		
		if (isset($_POST['Users']) && isset($_POST['Companies'])) {
		    $users->setAttributes($_POST['Users']);
			$users->status = 1;
                        $users->activkey=md5(microtime().$users->password);
                        // saving username : 'xyz' according to email xyz@gmail.com
                        $username = explode('@', $users->email);
                        $users->username = $username[0];
			$password=$users->password;
			$users->password=md5($users->password);
                        $users->cpassword=md5($users->cpassword);
                        $users->type = 2; //For Company
			if ($users->save()) {
			    //echo "<pre>"; print_r($_POST); die();
			$companies->setAttributes($_POST['Companies']);
                        //echo "<pre>"; print_r($companies->Attributes); die();
			if ($companies->save()){
			    $companyUser->idcompanies=$companies->idcompanies;
			    $companyUser->idusers=$users->idusers;
			    $companyUser->save(false);
			}
			  // Auto Login after registration
			    $identity=new UserIdentity($users->username,$password);
                                $identity->authenticate();
				Yii::app()->user->login($identity,0);
				$this->redirect(Yii::app()->createUrl('company/dashboard'));
			}
		}
		    $this->render('registration', array('companies'=>$companies, 'users' => $users));
	}
}
?>


