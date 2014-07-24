<?php

Yii::import('application.modules.user.models._base.BaseUserExp');

class UserExp extends BaseUserExp
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        public function rules() {
		return array(
                    array('description, from, to, cdate, mdate, ongoing ', 'safe'),
                    array('company, name, location', 'required'),

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