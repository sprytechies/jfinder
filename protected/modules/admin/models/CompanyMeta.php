<?php

Yii::import('application.modules.admin.models._base.BaseCompanyMeta');

class CompanyMeta extends BaseCompanyMeta
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        public function relations() {
            return array(
                'idcompany0'=>array(self::HAS_ONE,'Companies','idcompanies'),
            );
        }
}