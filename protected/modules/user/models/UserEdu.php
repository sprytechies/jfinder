<?php

Yii::import('application.modules.user.models._base.BaseUserEdu');

class UserEdu extends BaseUserEdu
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        public function rules() {
            return array(
                array('completed,ongoing ', 'safe'),
                array('name, degree, ', 'required'),
            );
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