<?php

class CompanyUsersController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'CompanyUsers'),
		));
	}

	public function actionCreate() {
		$model = new CompanyUsers;


		if (isset($_POST['CompanyUsers'])) {
			$model->setAttributes($_POST['CompanyUsers']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idcompany_users));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'CompanyUsers');


		if (isset($_POST['CompanyUsers'])) {
			$model->setAttributes($_POST['CompanyUsers']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idcompany_users));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'CompanyUsers')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CompanyUsers');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CompanyUsers('search');
		$model->unsetAttributes();

		if (isset($_GET['CompanyUsers']))
			$model->setAttributes($_GET['CompanyUsers']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}