<?php

Yii::import('application.models._base.BaseTerms');

class Terms extends BaseTerms
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        public function getParentCategory()
        {
            $criteria=array(
            'condition'=>'type=1',
            );
            $this->find($criteria);
        }
        public function searchCategory() {
		$criteria = new CDbCriteria;
                    
		$criteria->compare('idterms', $this->idterms);
		$criteria->compare('name', $this->name);
		$criteria->compare('slug', $this->slug);
		$criteria->compare('type', 1);
		$criteria->compare('parent', $this->parent);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        public function searchTag() {
		$criteria = new CDbCriteria;
                    
		$criteria->compare('idterms', $this->idterms);
		$criteria->compare('name', $this->name);
		$criteria->compare('slug', $this->slug);
		$criteria->compare('type', 2);
		$criteria->compare('parent', $this->parent);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}