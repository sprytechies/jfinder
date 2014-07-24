<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HoauthChangePass
 *
 * @author sprytechies
 */
class HoauthChangePass extends CWidget{
    //put your code here
    public function run(){
        $linkedInProfile=Users::model()->getLinkedInProfile();
        $this->setPass($linkedInProfile->email);
        $this->render('hoauthChangePass');
    }
    public function setPass($email){
        $user = Users::model()->findByAttributes(array('email'=>$email));
        $user->password = Users::model()->rand_password(8);
        $username = explode('@', $email);
        $users->username = $username[0];
        $user->save();
    }
    
}
