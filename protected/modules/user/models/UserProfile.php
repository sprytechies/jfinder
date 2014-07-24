<?php

Yii::import('application.modules.user.models._base.BaseUserProfile');

class UserProfile extends BaseUserProfile
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        public function behaviors(){
                return array(
                        'CTimestampBehavior' => array(
                                'class' => 'zii.behaviors.CTimestampBehavior',
                                'createAttribute' => 'cdate',
                                'updateAttribute' => 'mdate',
                        )
                );
        }
}