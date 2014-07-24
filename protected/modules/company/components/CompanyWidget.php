<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShareWidget
 *
 * @author sprytechies
 */
class CompanyWidget extends CWidget{
    public function run(){
	$companies = new Companies;
	$profile = CompanyUsers::model()->findByAttributes(array('idusers'=>Yii::app()->user->id));
       //echo '<pre>';var_dump($profile);die();
       if(isset($profile))
	    $companies = Companies::model()->findByAttributes(array('idcompanies'=>$profile->idcompanies));
       $this->render('companyWidget',array('companies'=>$companies));
    }
}

?>

