<?php

class JobsAppliedController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'JobsApplied'),
		));
	}

	public function actionCreate() {
		$model = new JobsApplied;


		if (isset($_POST['JobsApplied'])) {
			$model->setAttributes($_POST['JobsApplied']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idjobsapplied));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'JobsApplied');


		if (isset($_POST['JobsApplied'])) {
			$model->setAttributes($_POST['JobsApplied']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idjobsapplied));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'JobsApplied')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('JobsApplied');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new JobsApplied('search');
		$model->unsetAttributes();

		if (isset($_GET['JobsApplied']))
			$model->setAttributes($_GET['JobsApplied']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}