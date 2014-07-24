<?php

Yii::import('application.modules.company.models._base.BaseJobs');

class Jobs extends BaseJobs
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
	public static function gettype($type){
	    switch ($type) {
		    case 0:
			return "FullTime";
			break;
		    case 1:
			return "PartTime";
			break;
		    default:
			return "default";
			break;
	    }
	}
		    
		    
	public static function getKeywords($keywords){
	    switch ($keywords) {
		    case 0:
			return "Chartered Accountancy";
			break;
		    case 1:
			return "Computer Engineering";
			break;
		    case 2:
			return "Company Secretary";
			break; 
		    case 3:
			return "Event Mangement";
			break; 
		    case 4:
			return "Fashion Designing";
			break; 
		    case 5:
			return "Hotel Management";
			break; 
		    case 6:
			return "Mass Communication";
			break;
		    case 7:
			return "Foreign Languages";
			break; 
		    default:
			return "default";
			break;
	    }
	}
}
