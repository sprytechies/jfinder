<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserWidget
 *
 * @author sprytechies
 */
class UserWidget extends CWidget{
    //put your code here
    public function run(){
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
        $this->render('userWidget', array('userEdu'=>$userEdu,'userExp'=>$userExp,'profile'=>$profile,'validatedMembersExp'=>$validatedMembersExp,'validatedMembersEdu'=>$validatedMembersEdu,'upload'=>$upload));
	
    }
}
