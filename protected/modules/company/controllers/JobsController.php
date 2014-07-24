    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JobController
 *
 * @author sprytechies
 */
class JobsController extends GxController {
    
    
	public function actionPost() {
		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column2";
		$model = new Jobs;
		if (isset($_POST['Jobs'])) {
		    $model->setAttributes($_POST['Jobs']);
		    $company = CompanyUsers::model()->findByAttributes(array('idusers'=>Yii::app()->user->id));
		    $model->idcompany=$company->idcompanies;
		   if($model->validate()){
                        if ($model->save()) {
                            $this->redirect(Yii::app()->createUrl('company/jobs/list'));
                        }
                    }
		}
	    $this->render('post', array('model'=>$model));
	}
	
        public function filters() {
            return array('accessControl');
            
        }
        public function accessRules() {
            return array(
                array('allow',
                    'actions'=>array('job','post','update','list','applied','invite','userprofile'),
                    'users'=>array('@'),
                    ),
                array('deny',
                    'users'=>array('?'),
                    ),
            );
            
        }
	public function actionJob($id) {
		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column2";
		$model= Jobs::model()->findByPk($id);
		$this->render('job',array('model'=>$model));
	}
        public function actionUpdate($id) {

		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column2";
                $model= Jobs::model()->findByPk($id);
               		if (isset($_POST['Jobs'])) {
			$model->setAttributes($_POST['Jobs']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
                                {Yii::app()->end();}
				else
                                {
                                    Yii::app()->user->setFlash('success', "Data saved successfully!");
					//$this->redirect(array('list'));
                                }
			}
		}
		$this->render('update',array('model'=>$model));
	}
	
	public function actionList() {
		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column2";
		$model= new Jobs('search');
		$model->unsetAttributes();
               	$this->render('list',array('model'=>$model));
               
               
	}
		
        
	public function actionApplied() {
		$idjobs = $_GET['idjobs'];
                $dataProvider=new CActiveDataProvider('JobsApplied', array(
		'criteria'=>array(
		    'condition'=>'idjobs='.$idjobs,
		    'order'=>'cdate DESC',
		),
		));
//                echo "<pre>";var_dump($dataProvider->data);die;
//                $profile= JobInvites::model()->findByAttributes(array('idusers'=>$idusers));;
//                
		Yii::app()->theme='bluefields_company';
		$this->layout="//layouts/company_column2";
		//$model = new JobsApplied('search');
		//$model->unsetAttributes();
		
		$this->render('applied',array('dataProvider'=>$dataProvider));
	}
	
	public function actionInvite()
        {
                $idjobsapplied = $_GET['id'];
                $model= new JobInvites('search');
		if (isset($_POST['JobInvites'])) {
		    $model->setAttributes($_POST['JobInvites']);
		    $model->idjobsapplied= $idjobsapplied;
                    $model->status = 1;
                    if ($model->save()) {
                        //$this->refresh();
                        $jobsapplied = JobsApplied::model()->findByAttributes(array('idjobsapplied'=>$idjobsapplied));
			$this->redirect(Yii::app()->createUrl('company/jobs/applied',array('idjobs'=>$jobsapplied->idjobs)));
		    }
		}
                $this->renderPartial('invites',array(
                    'model'=>$model,
                ),false,true);
	}
        
        /**
         * Ajax Request
         * start chat
         * company has started the chat but user hav'nt join
         */
        public function actionStartChat(){
                $idjobsapplied =   $_GET['idjobsapplied'];
                $invite = JobInvites::model()->findByAttributes(array('idjobsapplied'=>$idjobsapplied,'status'=>1));
                $invite->status = 2;
                $invite->save();
                
        }
        
        /**
         * Ajax Request
         * Start Interview
         * that means both peers joined a room
         */
        public function actionStartInterview(){
            
                $jobsapplied = JobsApplied::model()->findByPk($_GET['idjobsapplied']);
                $interview = new Interviews;
                $interview->idjobs = $jobsapplied->idjobs;
                $interview->idusers = $jobsapplied->idusers;
                $interview->starttime = date('Y-m-d h:i:s');
                $interview->save();
        }
        
        /**
         * Ajax Request
         * Save Chat Message between two peers
         */
        public function actionSaveMessage(){
                    
                    
                $jobsapplied = JobsApplied::model()->findByAttributes(array('idjobsapplied'=>$_REQUEST['idjobsapplied']));
                if($jobsapplied || isset($jobsapplied)){
                        $interview = Interviews::model()->find('idjobs='.$jobsapplied->idjobs.' and idusers='.$jobsapplied->idusers.' and endtime is null');
                        
                        if($interview || isset($interview)){
                            $interviewmsg = new InterviewMessaage;
                            $interviewmsg->idusers = Yii::app()->user->id;
                            $interviewmsg->message = $_REQUEST['message'];
                            $interviewmsg->idinterview = $interview->idinterview;
                            $interviewmsg->save(false);
                        }
                }
                
        }
        
        
        /**
         * Ajax Request
         * end chat
         */
        public function actionEndChat(){
                $idjobsapplied =   $_GET['idjobsapplied'];
                $title = $_GET['title'];
                $invite = JobInvites::model()->findByAttributes(array('idjobsapplied'=>$idjobsapplied,'title'=>$title));
                $jobsapplied = JobsApplied::model()->findByPk($idjobsapplied);
                if(isset($invite) || $invite){
                    $invite->status = 0;
                    $invite->save();
                }
                
                
                /**
                 * saving end time in interview table
                 */
               $interview = Interviews::model()->find('idjobs='.$jobsapplied->idjobs.' and endtime is null');
                if(isset($interview) || $interview){
                    $interview->endtime = date('Y-m-d h:i:s');
                    $interview->save();
                }
                
                
                
        }
        
        
        public function actionUserProfile()
        {
                
                $idusers = $_GET['idusers'];
                $user=new CActiveDataProvider('Users', array(
                    'criteria'=>array(
                        'condition'=>'idusers='.$idusers,
                        'order'=>'cdate DESC',
                    )
                ));
                $profile= UserProfile::model()->findByAttributes(array('idusers'=>$idusers));;
                $experience=new CActiveDataProvider('UserExp', array(
                    'criteria'=>array(
                        'condition'=>'idusers='.$idusers,
                        'order'=>'cdate DESC',
                    )
                ));
                $education=new CActiveDataProvider('UserEdu', array(
                    'criteria'=>array(
                        'condition'=>'idusers='.$idusers,
                        'order'=>'cdate DESC',
                    )
                ));
                $this->renderPartial('userProfile',array(
                    'user'=>$user,
                    'profile'=>$profile,
                    'experience'=>$experience,
                    'education'=>$education,
                ),false,true);
        }
        
	
}
?>
