<?php

class JobsController extends AdminController {


        
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Jobs'),
		));
	}

	

	public function actionIndex() {
            $this->adminMenu = array(
            array('label' => 'All Jobs', 'icon' => 'user', 'url' => array('jobs/index'), 'active' => true),
	    array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
            array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites')),  
            array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
            );
            $model= new Jobs();
            $model->unsetAttributes();
            if (isset($_GET['Jobs'])) {
                $model->attributes = $_GET['Jobs'];
             }
            $this->render('index',array('model'=>$model));
		
	}
        public function actionCreate() {
            $this->adminMenu = array(
                array('label' => 'All Jobs', 'icon' => 'user', 'url' => array('jobs/index'), 'active' => true),
                array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
                array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites')),  
                array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
            );
		$model = new Jobs;
                if (isset($_POST['Jobs'])) {
			$model->setAttributes($_POST['Jobs']);
                        if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
				$this->redirect(array('index', 'id' => $model->idjobs));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate() {
            $this->adminMenu = array(
                array('label' => 'All Jobs', 'icon' => 'user', 'url' => array('jobs/index'), 'active' => true),
                array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
                array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites')),  
                array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
            );
            $id=$_GET['idjobs'];
            $model=$this->loadModel($id, 'Jobs');
                if (isset($_POST['Jobs'])) {
			$model->setAttributes($_POST['Jobs']);
                        if($model->validate())
                        {
                            if ($model->save()) {
				$this->redirect(array('index', 'id' => $model->idjobs));
                        }}
                    }
            
            
            $this->render('update', array('model' => $model,));
	}

	public function actionDelete($id) {
            
            ///$id=$_GET['idjobs'];
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Jobs')->delete();
                      // die();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
                
	}
        public function actionJobsApplied()
        {
	$this->adminMenu = array(            
            array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
	    array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'), 'active' => true),
            array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites')),  
            array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
        );
	$model= new JobsApplied();
	$model->unsetAttributes();
        if (isset($_GET['JobsApplied'])) {
                $model->attributes = $_GET['JobsApplied'];
         }
	$this->render('jobsapplied',array('model'=>$model));
	
        }
        public function actionCreate_applied() {
            $this->adminMenu = array(            
            array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
	    array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'), 'active' => true),
            array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites')),  
            array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
        );
		$model = new JobsApplied;
                if (isset($_POST['JobsApplied'])) {
			$model->setAttributes($_POST['JobsApplied']);
                        if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
				$this->redirect(array('jobsapplied', 'id' => $model->idjobsapplied));
			}
		}

		$this->render('create_applied', array( 'model' => $model));
	}
        public function actionUpdate_applied() {
            $this->adminMenu = array(            
            array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
	    array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'), 'active' => true),
            array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites')),  
            array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
        );
            $id=$_GET['idjobsapplied'];
            $model=  JobsApplied::model()->findByPk($id);
                if (isset($_POST['JobsApplied'])) {
			$model->setAttributes($_POST['JobsApplied']);
                        if($model->validate())
                        {
                            if ($model->save()) {
				$this->redirect(array('jobsapplied', 'id' => $model->idjobsapplied));
                        }}
                    }
            
            
            $this->render('update_applied', array('model' => $model));
	}

	public function actionDelete_applied() {
           
        $id=$_GET['idjobsapplied'];
		if (Yii::app()->getRequest()->getIsPostRequest()) {
                    $model=JobsApplied::model()->findByPk($id)->delete();
                    if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->redirect(array('jobsapplied'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionJobInvites()
        {
	$this->adminMenu = array(
            array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
	    array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
            array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites'), 'active' => true),  
            array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
        );
	$model= new JobInvites();
	$model->unsetAttributes();
        if (isset($_GET['JobInvites'])) {
                $model->attributes = $_GET['JobInvites'];
         }
	$this->render('jobinvites',array('model'=>$model));
	
        }
        public function actionCreate_invites() {
            $this->adminMenu = array(
                array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
                array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
                array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites'), 'active' => true),  
                array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
        );
		$model = new JobInvites;
                if (isset($_POST['JobInvites']) ) {
			$model->setAttributes($_POST['JobInvites']);
                        if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
				$this->redirect(array('jobinvites', 'id' => $model->idjobinvites));
			}
		}
                $model_applied=new JobsApplied;

		$this->render('create_invites', array( 'model' => $model,'model_applied'=>$model_applied));
	}
        public function actionUpdate_invited() {
            $this->adminMenu = array(
                array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
                array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
                array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites'), 'active' => true),  
                array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'),),
        );
            $id=$_GET['idjobinvites'];
            $model= JobInvites::model()->findByPk($id);
                if (isset($_POST['JobInvites'])) {
			$model->setAttributes($_POST['JobInvites']);
                        if($model->validate())
                        {
                            if ($model->save()) {
				$this->redirect(array('jobinvites', 'id' => $model->idjobinvites));
                        }}
                    }
            
            $this->render('update_invites', array('model' => $model,));
	}

	public function actionDelete_invited() {
            
            $id=$_GET['idjobinvites'];
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model=JobInvites::model()->findByPk($id)->delete();
                       // die();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('jobsapplied'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionJob_statistics()
        {
	$this->adminMenu = array(
            array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
	    array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
            array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites'),),  
            array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'), 'active' => true),
        );
	
        $model= new Jobs;
        $model->unsetAttributes();
        if (isset($_GET['Jobs'])) {
                $model->attributes = $_GET['Jobs'];
         }
        
           $this->render('job_statistics', array('model' => $model,));
        }
        public function actionView_statistics()
        {
	$this->adminMenu = array(
            array('label' => 'Jobs', 'icon' => 'user', 'url' => array('jobs/index'),),
	    array('label' => 'Applied', 'icon' => 'user', 'url' => array('jobs/jobsapplied'),),
            array('label' => 'Invited', 'icon' => 'book', 'url' => array('jobs/Jobinvites'),),  
            array('label' => 'Job Statistics', 'icon' => 'book', 'url' => array('jobs/job_statistics'), 'active' => true),
        );
        $jobid=$_GET['idjobs'];
        
        $query="select DATE_FORMAT(cdate,'%d-%m-%Y') as cdate ,count(idjobsapplied) as idjobsapplied from jobs_applied where idjobs=$jobid GROUP BY CAST(cdate AS DATE)";
        $count=Yii::app()->db->createCommand("SELECT COUNT(*) FROM jobs_applied where idjobs=$jobid")->queryScalar();
        $model= new CSqlDataProvider($query,array('totalItemCount'=>$count,));
        
        $this->render('view_statistics',array('model'=>$model));
        
        }

	
        public function loadModel($id,$modelClass )
        {
            $model =CActiveRecord::model($modelClass);
            
                $model= $model->model()->findByPk($id);
                if($model===null)
                        throw new CHttpException(404,'The requested page does not exist.');
                return $model;
        }

}