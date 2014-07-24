<?php

class UserProjectsController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UserProjects'),
		));
	}

	public function actionCreate() {
		$model = new UserProjects;


		if (isset($_POST['UserProjects'])) {
			$model->setAttributes($_POST['UserProjects']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idprojects));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UserProjects');


		if (isset($_POST['UserProjects'])) {
			$model->setAttributes($_POST['UserProjects']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idprojects));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'UserProjects')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UserProjects');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UserProjects('search');
		$model->unsetAttributes();

		if (isset($_GET['UserProjects']))
			$model->setAttributes($_GET['UserProjects']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}