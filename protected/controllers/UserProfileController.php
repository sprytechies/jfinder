<?php

class UserProfileController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UserProfile'),
		));
	}

	public function actionCreate() {
		$model = new UserProfile;


		if (isset($_POST['UserProfile'])) {
			$model->setAttributes($_POST['UserProfile']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->iduser_profile));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UserProfile');


		if (isset($_POST['UserProfile'])) {
			$model->setAttributes($_POST['UserProfile']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->iduser_profile));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'UserProfile')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UserProfile');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UserProfile('search');
		$model->unsetAttributes();

		if (isset($_GET['UserProfile']))
			$model->setAttributes($_GET['UserProfile']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}