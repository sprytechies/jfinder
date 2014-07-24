<?php

class JobTermsController extends AdminController
{
	public function actionIndex()
	{
	$this->adminMenu = array(
            
            array('label' => 'Categories', 'icon' => 'home', 'url' => array('jobTerms/index'), 'active' => true),
            array('label' => 'Tags', 'icon' => 'user', 'url' => array('jobTerms/tags'),),

        );
        
	$model= new Terms('searchCategory');
        //$model=new Terms(); 
       // $model->search();
        
        //$model=$model->model()->findAll($criteria);
	$model->unsetAttributes();
        if(isset($_GET['Terms'])){
            $model->setAttributes($_GET['Terms']);

   
        }
	$this->render('index',array('model'=>$model));
	}
        public function actionCreate_category()
        {
            $this->adminMenu = array(
            
            array('label' => 'Categories', 'icon' => 'home', 'url' => array('jobTerms/index'), 'active' => true),
            array('label' => 'Tags', 'icon' => 'user', 'url' => array('jobTerms/tags'),),

        );
            $model=new JobTerms;
            $model_terms=new Terms;
            if(isset($_POST['Terms']))
            {
                //$model->attributes=$_POST['JobTerms'];
                $model_terms->setAttributes($_POST['Terms']);
                $model_terms->type=1;
                if($model_terms->validate())
                {
                   if ($model_terms->save()) {
                    $model->setAttributes($_POST['JobTerms']);
                    $model->idterms=$model_terms->idterms;
                    if($model->save()){
                        $this->redirect(array('index', 'idjobterms' => $model->idjobterms));
                    }
                   }
                }
            }
            $this->render('create_category',array('model'=>$model,'model_terms'=>$model_terms));
        }
        public function actionUpdate_category()
        {
            $this->adminMenu = array(
            
            array('label' => 'Categories', 'icon' => 'home', 'url' => array('jobTerms/index'), 'active' => true),
            array('label' => 'Tags', 'icon' => 'user', 'url' => array('jobTerms/tags'),),

        );
            $id=$_GET['idjobterms'];
            $model= JobTerms::model()->findByPk($id);
            $id_terms=$_GET['idterms'];
            $model_terms=Terms::model()->findByPk($id_terms);
            if(isset($_POST['Terms']))
            {
                //$model->attributes=$_POST['JobTerms'];
                $model_terms->setAttributes($_POST['Terms']);               
                if($model_terms->validate())
                {
                   if ($model_terms->save()) {
                    $model->setAttributes($_POST['JobTerms']);
                    if($model->save()){
                        $this->redirect(array('index', 'idjobterms' => $model->idjobterms));
                    }
                   }
                }
            }
            $this->render('update_category',array('model'=>$model,'model_terms'=>$model_terms));
        }
        
        public function actionDelete_category() {
            $id=$_GET['idjobterms'];
            if (Yii::app()->getRequest()->getIsPostRequest()) {
                        $id_terms=JobTerms::model()->findByPk($id)->idterms;
			 if(JobTerms::model()->findByPk($id)->delete())
                            {
                            Terms::model()->findByPk($id_terms)->delete();
                             }

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }
        public function actionTags() 
        {
            $this->adminMenu = array(
                array('label' => 'Categories', 'icon' => 'home', 'url' => array('jobTerms/index'),),
                array('label' => 'Tags', 'icon' => 'user', 'url' => array('jobTerms/tags'), 'active' => true),

            );
            
        
	$model= new Terms('searchTag');
        $model->unsetAttributes();
        if(isset($_GET['Terms'])){
            $model->setAttributes($_GET['Terms']);

   
        }
            $this->render('tags',array('model'=>$model));
         }
         public function actionCreate_tag()
        {
             $this->adminMenu = array(
                array('label' => 'Categories', 'icon' => 'home', 'url' => array('jobTerms/index'),),
                array('label' => 'Tags', 'icon' => 'user', 'url' => array('jobTerms/tags'), 'active' => true),

            );
            $model=new JobTerms;
            $model_terms=new Terms;
            if(isset($_POST['Terms']))
            {
                //$model->attributes=$_POST['JobTerms'];
                $model_terms->setAttributes($_POST['Terms']);
                $model_terms->type=2;
                if($model_terms->validate())
                {
                   if ($model_terms->save()) {
                    $model->setAttributes($_POST['JobTerms']);
                    $model->idterms=$model_terms->idterms;
                    if($model->save()){
                        $this->redirect(array('tags', 'idjobterms' => $model->idjobterms));
                    }
                   }
                }
            }
            $this->render('create_tag',array('model'=>$model,'model_terms'=>$model_terms));
        }
        public function actionUpdate_tag()
        {
            $this->adminMenu = array(
                array('label' => 'Categories', 'icon' => 'home', 'url' => array('jobTerms/index'),),
                array('label' => 'Tags', 'icon' => 'user', 'url' => array('jobTerms/tags'), 'active' => true),

            );
            $id=$_GET['idjobterms'];
            $model= JobTerms::model()->findByPk($id);
            $id_terms=$_GET['idterms'];
            $model_terms=Terms::model()->findByPk($id_terms);
            if(isset($_POST['Terms']))
            {
                //$model->attributes=$_POST['JobTerms'];
                $model_terms->setAttributes($_POST['Terms']);               
                if($model_terms->validate())
                {
                   if ($model_terms->save()) {
                    $model->setAttributes($_POST['JobTerms']);
                    if($model->save()){
                        $this->redirect(array('tags', 'idjobterms' => $model->idjobterms));
                    }
                   }
                }
            }
            $this->render('update_category',array('model'=>$model,'model_terms'=>$model_terms));
        }
        
        public function actionDelete_tag() {
            $id=$_GET['idjobterms'];
            if (Yii::app()->getRequest()->getIsPostRequest()) {
                        $id_terms=JobTerms::model()->findByPk($id)->idterms;
			 if(JobTerms::model()->findByPk($id)->delete())
                            {
                            Terms::model()->findByPk($id_terms)->delete();
                             }

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }

}