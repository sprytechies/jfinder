<?php

Yii::import('application.modules.admin.models._base.BaseUserMeta');

class UserMeta extends BaseUserMeta
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}