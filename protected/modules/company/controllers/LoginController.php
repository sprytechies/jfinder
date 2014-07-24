<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author sprytechies
 */
class LoginController extends Controller {

	
	public function actionIndex()
	{
	Yii::app()->theme='bluefields_company';
	$this->layout="//layouts/company_column1";
        $model=new CompanyLoginForm;
	if(Yii::app()->user->isGuest){
		   if(isset($_POST['CompanyLoginForm']))
			{
				$model->attributes=$_POST['CompanyLoginForm'];
				// validate user input and redirect to previous page if valid
				
				if($model->validate()) {
                                   $this->redirect(Yii::app()->createUrl('company/dashboard'));
				}
                       }
               }
              $this->render('index',array('model' => $model));
	}
}