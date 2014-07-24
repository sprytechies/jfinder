<?php

Yii::import('application.models._base.BaseJobInvites');

class JobInvites extends BaseJobInvites
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