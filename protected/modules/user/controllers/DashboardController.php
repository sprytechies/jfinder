<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardController
 *
 * @author sprytechies
 */
class DashboardController extends Controller {
    
        
        public function filters()
    	{
    		return array(
                        'accessControl', 
                        'postOnly + delete',
                );
    	}
  	public function accessRules()
        {
            return array(
                array('allow', // allow all users to perform 'index' and 'view' actions
                    'actions' => array('index','logout','more_res','savereply','apply_job','more_applied','save_job','more_saved','delete_saved','save_note_popup'),
                    'users' => array('@'),
                ),
//                array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                    'actions' => array('index'),
//                    'users' => array('@'),
//                ),
//                array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                    'actions' => array('index'),
//                    'users' => array('admin'),
//                ),
                array('deny', // deny all users
                    'users' => array('*'),
                ),
//
            );
       }
        public function actionIndex() {
            
              /* if(Yii::app()->getModule('user')->user->isGuest)
                Yii::app()->getModule('user')->user->setReturnUrl('user/login');*/
            
                $this->layout="//layouts/user_column2";
                Yii::import('ext.multimodelform.MultiModelForm');
                Yii::import("xupload.models.XUploadForm");
                $upload = new XUploadForm;
		$profile = UserProfile::model()->findByAttributes(array('idusers'=>Yii::app()->user->id));
		if(!isset($profile))
		$profile = new UserProfile;
		$userExp = new UserExp;
                $userEdu = new UserEdu;
                $validatedMembersExp = array();  //ensure an empty array
                $validatedMembersEdu = array();  //ensure an empty array
                
                //JobsApplied::model()->exists('idusers='.Yii::app()->user->id.' and idjobsapplied='.);
                
                /**
                * Updating User Profile
                */
                
               if (isset($_POST['UserProfile'])) {
                       $profile->setAttributes($_POST['UserProfile']);
                        
                       /**
                        * Updating User Experience
                        */
                       $validatedMembersExp = array(); //ensure an empty array
                       //the value for the foreign key 'idusers'
                       $masterValues = array ('idusers'=>Yii::app()->user->id);

                       /**
                        * Updating User Education
                        */
			$profile->idusers = Yii::app()->user->id;
                       $validatedMembersEdu = array(); //ensure an empty array
		       
                       //the value for the foreign key 'idusers'
                       $masterValues = array ('idusers'=>Yii::app()->user->id);
		       
		       if ($profile->save(false) && MultiModelForm::save($userExp,$validatedMembersExp,$deleteMembers,$masterValues) && MultiModelForm::save($userEdu,$validatedMembersEdu,$deleteMembers,$masterValues) ) {
                               
                           if (Yii::app()->getRequest()->getIsAjaxRequest())
                                       Yii::app()->end();
                               else
                                       $this->refresh();
                       }
              }
              $saveJob=new JobsSaved;
               $user_id=Yii::app()->user->id;
              if(isset($_POST['JobsSaved'])){
                  
                  //$saveJob->setAttributes($_POST['JobsSaved']);
                  
                  $saveJob->save();
              }
          
        $reply_data=Yii::app()->db->createCommand()
        ->select('message')
        ->from('job_messages as jm') 
        ->join('jobs_applied as ja','jm.idjobsapplied=ja.idjobsapplied')
        ->queryAll();
        
        
        $data = Yii::app()->db->createCommand()
       ->select('idjobs,title,j.description,keywords,name')
       ->from('jobs j')
       ->join('companies c','j.idcompany=c.idcompanies')
       ->limit(3)
       ->queryAll();
        
      
        $data_applied = Yii::app()->db->createCommand()
       ->select('ja.idjobs,title,j.description,keywords,name')
       ->from('jobs j')
       ->join('companies c','j.idcompany=c.idcompanies')
       ->join('jobs_applied as ja','ja.idjobs=j.idjobs')
       ->where("ja.idusers = $user_id")
       ->limit(3)
       ->queryAll();
        
       $data_savedjob = Yii::app()->db->createCommand()
       ->select('js.idjobs,title,j.description,keywords,name')
       ->from('jobs j')
       ->join('companies c','j.idcompany=c.idcompanies')
       ->join('jobs_saved as js','js.idjobs=j.idjobs')
       ->where("js.iduser = $user_id")
       ->limit(3)
       ->queryAll();
     
        function getAppliedId($jobid)
            {
            $user_id=Yii::app()->user->id; 
            $applyData= Yii::app()->db->createCommand()
                       ->select('idjobsapplied')
                       ->from('jobs_applied') 
                       ->where("idusers=$user_id and idjobs=$jobid") 
                       ->queryRow();
            return ($applyData['idjobsapplied']);
            //die();

            }
        function getMessages($applyid)
            {
            $reply_data=Yii::app()->db->createCommand()
                    ->select('message')
                    ->from('job_messages') 
                    ->where("idjobsapplied=$applyid")
                    ->order('cdate DESC')
                    ->queryAll(); 
            //print_r($reply_data);
            return $reply_data;
            }
        function getSavedId($jobid){
            $user_id=Yii::app()->user->id; 
            $saved= Yii::app()->db->createCommand()
                    ->select('idsavedjob')
                    ->from('jobs_saved') 
                    ->where("iduser=$user_id and idjobs=$jobid") 
                    ->queryRow();
         return ($saved['idsavedjob']);
            
        }
        
        $this->render('index', array('userEdu'=>$userEdu,'userExp'=>$userExp,'profile'=>$profile,'validatedMembersExp'=>$validatedMembersExp,'validatedMembersEdu'=>$validatedMembersEdu,'upload'=>$upload,'data'=>$data,'data_applied'=>$data_applied,'data_savedjob'=>$data_savedjob));
	}
        
	public function actionMore_res() {
        $id_range=Yii::app()->session['range'];
        $data= Yii::app()->db->createCommand()
            ->select('idjobs,title,j.description,keywords,name')
            ->from('jobs j')
            ->join('companies c','j.idcompany=c.idcompanies')
            ->where("j.idjobs >$id_range")
            ->limit(3)
            ->queryAll();
        
        function getAppliedId($jobid)
        {
            $user_id=Yii::app()->user->id; 
            $applyData= Yii::app()->db->createCommand()
                    ->select('idjobsapplied')
                    ->from('jobs_applied') 
                    ->where("idusers=$user_id and idjobs=$jobid") 
                    ->queryRow();
         return ($applyData['idjobsapplied']);
         }
         function getSavedId($jobid){
            $user_id=Yii::app()->user->id; 
            $saved= Yii::app()->db->createCommand()
                    ->select('idsavedjob')
                    ->from('jobs_saved') 
                    ->where("iduser=$user_id and idjobs=$jobid") 
                    ->queryRow();
         return ($saved['idsavedjob']);
            
        }
        function getMessages($applyid)
        {
            $reply_data=Yii::app()->db->createCommand()
                    ->select('message')
                    ->from('job_messages') 
                    ->where("idjobsapplied=$applyid")
                    ->order('cdate DESC')
                    ->queryAll(); 
            //print_r($reply_data);
            return $reply_data;
        }
           //print_r($data);
        $this->renderPartial('more_res',array('data'=>$data));
        }
        public function actionSavereply() {
           $model = new JobsApplied;
                       
            $model_jobmessages= new JobMessages;
            $model_jobmessages->fromto=1;
            $model_jobmessages->message=$_POST['message'];
            $model_jobmessages->cdate= new CDbExpression('NOW()');
            $model_jobmessages->mdate=  time();
            $model_jobmessages->idjobsapplied=$_POST['apply_id'];
            if(!$model_jobmessages->save())
            { 
                echo $_POST['message'];
                echo "apply id".$_POST['apply_id'];
                die();
                
            }  else {
    

            $val= $_POST['message'];
            
            $this->renderPartial('savereply',array('val'=>$val));
            }
            
        }
        
        public function actionApply_job() {
            $model=new JobsApplied;
            $idjob=$_POST['idjob'];
            
            $userid=Yii::app()->user->id;
            
            $check_apply=Yii::app()->db->createCommand()
            ->select('idjobsapplied')
            ->from('jobs_applied')    
            ->where("idjobs=$idjob and idusers=$userid")
            ->queryRow();
            
            if(!isset($check_apply['idjobsapplied'])){           
            $model->idjobs=$idjob;
            $model->idusers=Yii::app()->user->id;
            $model->cdate=  new CDbExpression('NOW()');
            $model->mdate=  time();
                if($model->save()){ 
                $apply_id=$model->idjobsapplied;
                $this->renderPartial('apply_job',array('apply_id'=>$apply_id));
                }else{echo "Error while applying";}
            }
            else
                 { echo 'already applied to this job';}
            }
            
        public function actionJobs_applied(){
                 $user_id=Yii::app()->user->id;
                 $data_applied = Yii::app()->db->createCommand()
                ->select('ja.idjobs,title,j.description,keywords,name')
                ->from('jobs j')
                ->join('companies c','j.idcompany=c.idcompanies')
                ->join('jobs_applied as ja','ja.idjobs=j.idjobs')
                ->where("ja.idusers = $user_id")
                ->limit(3)
                ->queryAll();
                 
                 $this->renderPartial('jobs_applied',array('data_applied'=>$data_applied));
            }
        public function actionMore_applied() {
        $id_range=Yii::app()->session['range_applied'];
        $user_id=Yii::app()->user->id;
                 $data_applied = Yii::app()->db->createCommand()
                ->select('ja.idjobs,title,j.description,keywords,name')
                ->from('jobs j')
                ->join('companies c','j.idcompany=c.idcompanies')
                ->join('jobs_applied as ja','ja.idjobs=j.idjobs')
                ->where("ja.idusers = $user_id and ja.idjobs >$id_range")
                ->limit(3)
                ->queryAll();
        function getSavedId($jobid){
            $user_id=Yii::app()->user->id; 
            $saved= Yii::app()->db->createCommand()
                    ->select('idsavedjob')
                    ->from('jobs_saved') 
                    ->where("iduser=$user_id and idjobs=$jobid") 
                    ->queryRow();
         return ($saved['idsavedjob']);
            
        }
        function getAppliedId($jobid)
        {
            $user_id=Yii::app()->user->id; 
            $applyData= Yii::app()->db->createCommand()
                    ->select('idjobsapplied')
                    ->from('jobs_applied') 
                    ->where("idusers=$user_id and idjobs=$jobid") 
                    ->queryRow();
         return ($applyData['idjobsapplied']);
         }
         
        function getMessages($applyid)
        {
            $reply_data=Yii::app()->db->createCommand()
                    ->select('message')
                    ->from('job_messages') 
                    ->where("idjobsapplied=$applyid")
                    ->order('cdate DESC')
                    ->queryAll(); 
            //print_r($reply_data);
            return $reply_data;
        }
           //print_r($data);
                 $this->renderPartial('more_applied',array('data_applied'=>$data_applied));
        }
        
        public function actionSave_job() {
            $model=new JobsSaved;
            $idjob=$_POST['jobid'];
            
            $userid=Yii::app()->user->id;
            
            $check_saved=Yii::app()->db->createCommand()
            ->select('idsavedjob')
            ->from('jobs_saved')    
            ->where("idjobs=$idjob and iduser=$userid")
            ->queryRow();
            
            if(!isset($check_saved['idsavedjob'])){           
                  $model->idjobs=$_POST['jobid'];
                  $model->iduser = Yii::app()->user->id;
                  $model->cdate= new CDbExpression('NOW()');
                  $model->mdate=  time();
                  $model->note=$_POST['note'];
                if($model->save()){ 
                $saved_id=$model->idsavedjob;
                $this->renderPartial('save_job',array('saved_id'=>$saved_id));
                }else{echo "Error while applying";}
            }
            else
                 { echo 'already saved this job';}
            }
        public function actionMore_saved() {
            $id_range=Yii::app()->session['range_saved'];
            $user_id=Yii::app()->user->id;
            $data_savedjob = Yii::app()->db->createCommand()
                    ->select('js.idjobs,title,j.description,keywords,name')
                    ->from('jobs j')
                    ->join('companies c','j.idcompany=c.idcompanies')
                    ->join('jobs_saved as js','js.idjobs=j.idjobs')
                    ->where("js.iduser = $user_id and js.idjobs > $id_range")
                    ->limit(3)
                    ->queryAll();
            function getSavedId($jobid){
             $user_id=Yii::app()->user->id; 
                $saved= Yii::app()->db->createCommand()
                    ->select('idsavedjob')
                    ->from('jobs_saved') 
                    ->where("iduser=$user_id and idjobs=$jobid") 
                    ->queryRow();
            return ($saved['idsavedjob']);
           }
        
            function getAppliedId($jobid)
            {
                $user_id=Yii::app()->user->id; 
                $applyData= Yii::app()->db->createCommand()
                        ->select('idjobsapplied')
                        ->from('jobs_applied') 
                        ->where("idusers=$user_id and idjobs=$jobid") 
                        ->queryRow();
             return ($applyData['idjobsapplied']);
             }
         
            function getMessages($applyid)
            {
                $reply_data=Yii::app()->db->createCommand()
                        ->select('message')
                        ->from('job_messages') 
                        ->where("idjobsapplied=$applyid")
                        ->order('cdate DESC')
                        ->queryAll(); 
                //print_r($reply_data);
                return $reply_data;
            }
           //print_r($data);
                 $this->renderPartial('more_saved',array('data_saved'=>$data_savedjob));
        }
        public function actionDelete_saved() {
        $user_id=Yii::app()->user->id;
        $saved_jobid=$_POST['savedid'];
        $query="delete from jobs_saved where idsavedjob=".$saved_jobid;
       $data_savedjob = Yii::app()->db->createCommand($query);
       $data_savedjob->execute();
       if($data_savedjob){
           echo "Removed successfully";
       }else{
           echo "Error While removing..";
       }
        }
        public function actionSave_note_popup(){
        $user_id=Yii::app()->user->id;
        $jobid=$_POST['jobid'];
        //$query="delete from jobs_saved where idsavedjob=".$saved_jobid;
       $data_saved_popup = Yii::app()->db->createCommand()
                    ->select('idjobs,title,j.description,name')
                    ->from('jobs j') 
                    ->join('companies c','j.idcompany=c.idcompanies')
                    ->where("idjobs=$jobid")
                    ->queryAll();
       if($data_saved_popup){
           $value=$data_saved_popup[0];
          $this->renderPartial('save_note_popup',array('value'=>$value));
       }else{
           echo "Error While removing..";
       }
        }
}