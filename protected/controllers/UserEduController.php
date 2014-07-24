<?php

class UserEduController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UserEdu'),
		));
	}

	public function actionCreate() {
		$model = new UserEdu;


		if (isset($_POST['UserEdu'])) {
			$model->setAttributes($_POST['UserEdu']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idedu));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UserEdu');


		if (isset($_POST['UserEdu'])) {
			$model->setAttributes($_POST['UserEdu']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idedu));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'UserEdu')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UserEdu');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UserEdu('search');
		$model->unsetAttributes();

		if (isset($_GET['UserEdu']))
			$model->setAttributes($_GET['UserEdu']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}