<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jfinder
 *
 * @author sprytechies
 */
class Jfinder {
    //put your code here
    public function whichUser(){
        $user = Users::model()->findByAttributes(array('idusers'=>Yii::app()->user->id));
        if($user->type == 2){
            return "company";
        }
        else if($user->type == 1){
            return "user";
        }
        else if($user->type == 0){
            return "admin";
        }
    }
    
    
    public function pageLoaded(){
        $user = UserOnline::model()->findByAttributes(array('idusers'=>Yii::app()->user->id));
        $user->last_activity = date('Y-m-d H:i:s');
        $user->save();
       
    }
    
    
}
