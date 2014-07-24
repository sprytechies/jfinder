<?php

class UserExpController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UserExp'),
		));
	}

	public function actionCreate() {
		$model = new UserExp;


		if (isset($_POST['UserExp'])) {
			$model->setAttributes($_POST['UserExp']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idexp));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UserExp');


		if (isset($_POST['UserExp'])) {
			$model->setAttributes($_POST['UserExp']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idexp));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'UserExp')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UserExp');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UserExp('search');
		$model->unsetAttributes();

		if (isset($_GET['UserExp']))
			$model->setAttributes($_GET['UserExp']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}