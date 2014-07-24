<?php

Yii::import('application.models._base.BaseUserProjects');

class UserProjects extends BaseUserProjects
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}