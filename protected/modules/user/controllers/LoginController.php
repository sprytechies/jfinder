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

	
	/**
	 * Displays the login page
	 */
	public function actionIndex()
	{
                $this->layout="//layouts/user_column1";
		
		$model=new UserLoginForm;

		if (Yii::app()->user->isGuest) {
			// collect user input data
			if(isset($_POST['UserLoginForm']))
			{       
				$model->attributes=$_POST['UserLoginForm'];
                                
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
                                     $this->redirect(Yii::app()->createUrl('user/dashboard'));
				}
                                
			}
			// display the login form
			$this->render('index',array('model'=>$model,));
		}
	}
}