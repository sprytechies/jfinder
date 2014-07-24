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
    
        /**
         * User Profile
         */
        public function filters() {
            return array('accessControl');
            
        }
        public function accessRules() {
            
            return array(
                array('allow',
                        'actions' => array('index','logout'),
                        'users' => array('@'),
                      ),
                array('deny',
                    'users'=>array('*'))
             );
            
        }
        public function actionIndex() {
                Yii::app()->theme='bluefields_company';
                $this->layout="//layouts/company_column2";
               $companies = new Companies;
	       $companyUser = new CompanyUsers;
	       $profile = CompanyUsers::model()->findByAttributes(array('idusers'=>Yii::app()->user->id));
	       if(isset($profile))
		    $companies = Companies::model()->findByAttributes(array('idcompanies'=>$profile->idcompanies));
	       
	       if (isset($_POST['Companies'])) {
			$companies->setAttributes($_POST['Companies']);
                        //echo '<pre>';print_r($companies);die();
                        if ($companies->save()) {
                                if($companies->idcompanies){
                                    $companyUser->idcompanies=$companies->idcompanies;
                                    $companyUser->idusers=Yii::app()->user->id;
                                    $companyUser->save(false);
                                    $this->refresh();
                            }
                        }
		    }
		$this->render('index', array('companies' => $companies));
	    }
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->createUrl('company/login'));
	}
}
