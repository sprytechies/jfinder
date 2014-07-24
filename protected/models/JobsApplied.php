<?php

Yii::import('application.models._base.BaseJobsApplied');

class JobsApplied extends BaseJobsApplied
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public static function checkInvitation($idjobsapplied){
            $result = JobInvites::model()->exists('idjobsapplied='.$idjobsapplied);
            return $result;
        }
        
        /**
         * 
         * @param type $idjobsapplied
         * @return type boolean
         * status = 1 means invitation has been sent from the company.
         */
        public static function checkInt($idjobsapplied){
            $result = JobInvites::model()->exists('idjobsapplied='.$idjobsapplied.' and status=1');
            return $result;
        }
        public static function checkProfile($idusers){
            $result = UserProfile::model()->exists('idusers='.$idusers);
            return $result;
        }
        
        /**
         * 
         * @param type $idjobsapplied
         * @return string|boolean
         * returns a list of jobsapplied date
         */
        public static function getDropDown($idjobsapplied){
            $jobsinvites = JobInvites::model()->findAllByAttributes(array('idjobsapplied'=>$idjobsapplied));
            
            $invite = JobInvites::model()->find('idjobsapplied='.$idjobsapplied);
            
            if(isset($jobsinvites)){
                $li = null;
                foreach($jobsinvites as $data ){
                    $li.= '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);">'.$data->invitedon.'</a></li>';

                }
                $dropdown = '<div class="dropdown">
                            <a data-toggle="dropdown" href="#" class="btn btn-small btn-default">Invited</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                '.$li.'
                                <li role="presentation">'.
                                    CHtml::ajaxLink(
                                        $text = 'Invite Again', 
                                        $url = Yii::app()->createUrl("company/jobs/invite",array("id"=>$invite->idjobsapplied)), 
                                        $ajaxOptions=array (
                                            'type'=>'POST',
                                            'url'=>"js:$(this).attr('href')",
                                            'success'=>'function(data) {$("#invite").html(data); $("#invite").modal(); }'
                                            ), 
                                        $htmlOptions=array ()
                                        )
                                .'</li>
                            </ul>
                            </div>';
                return $dropdown;
            }else{
                return false;
            }
        }
        
	function getAppliedId($jobid)
        {
            $user_id=Yii::app()->user->id; 
            $applyData= Yii::app()->db->createCommand()
                    ->select('idjobsapplied')
                    ->from('jobs_applied') 
                    ->where("idusers=$user_id and idjobs=$jobid") 
                    ->queryRow();
         return ($applyData['idjobsapplied']);
         }
         
        /**
         * 
         * @param type $idjobsapplied
         * @return type
         * get title from idjobsapplied
         */ 
        public static function getTitle($idjobsapplied){
            $jobsInvites = JobInvites::model()->findByAttributes(array('idjobsapplied'=>$idjobsapplied, 'status'=>1));
            $title = $jobsInvites->title;
            return $title;
        }
        
        /**
         * 
         * @param type $idusers
         * return online/offline/idle image. 
         */
        public function checkImage($idusers){
            
            $user = UserOnline::model()->findByAttributes(array('idusers'=>$idusers));
            $offline = CHtml::image(Yii::app()->baseUrl."/images/offline.png",'',array("title"=>"Offline"));
            $online = CHtml::image(Yii::app()->baseUrl."/images/online.png",'',array("title"=>"Online"));
            $idle = CHtml::image(Yii::app()->baseUrl."/images/idle.png",'',array("title"=>"Idle"));
            if($user->last_activity==Null){
                echo $offline;
            }
            else{
                $difference = number_format((time()-strtotime($user->last_activity))/60,2);
                if($difference>20){
                    echo $offline;
                }
                else{
                    if($difference>15)
                        echo $idle;
                    else
                        echo $online;
                }
                
            }
        }
        
        /**
         * 
         * @param type $idusers
         * @return boolean
         * check if user is online or not
         */
        public function isOnline($idusers){
            
            $user = UserOnline::model()->findByAttributes(array('idusers'=>$idusers));
            if($user->last_activity==Null){
                return false;
            }
            else{
                $difference = number_format((time()-strtotime($user->last_activity))/60,2);
                
                if($difference>20){
                    return false;
                }
                else{
                    return true;
                }
                
            }
        }
	
}