<?php

class StartController extends Controller
{
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
                    'actions' => array('index'),
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
            );
       }
	public function actionIndex()
	{
                $idjobsapplied = $_GET['idjobsapplied'];
                $title = $_GET['title'];
                $jobsinvite = JobInvites::model()->findByAttributes(array('idjobsapplied'=>$idjobsapplied,'title'=>$title));
                
                /**
                 * If one's interview is closed then he cannot restart the webconferencing again.
                 * 
                 */
                if($jobsinvite->status==0){
                    Yii::app()->user->setFlash('message','This Interview is closed now');
                    $this->redirect(Yii::app()->createUrl(Jfinder::whichUser()."/dashboard"));
                }
                else{
                    $this->layout="//layouts/webconference";
                    $this->render('index');
                }
        }
}