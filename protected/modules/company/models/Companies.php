<?php

Yii::import('application.modules.company.models._base.BaseCompanies');

class Companies extends BaseCompanies
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}