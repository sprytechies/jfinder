<div class="col-lg-7 width7 right_part">
        <div class="well done m-top1">
            
              <h4>Jobs Applied</h4>
              <p class="border"></p>
              <div class="m-top2">
            <p><span class="glyphicon glyphicon-list"></span> <span><strong>Previous Ad Details</strong></span></p>
            <div class="table-ad-list">
	

<?php

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'Job-grid',
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed hover ',
//    'filter'=>$model,
    
    'columns'=>array(
        array(
            'header'=>'',
            'value'=>'$data->checkImage($data->idusers0->idusers)'
        ),
        array(
            'header'=>'User Name',
            'value'=>'$data->idusers0->username'
        ),
	array(
            'header'=>'Title',
            'value'=>'$data->idjobs0->title'
        ),
        
//        array(
//            'type'=>'html',
//            'header'=>'invited',
//            'value'=>'$data->getDropDown($data->idjobsapplied)'
//        ),
	'buttons' => array(
		  'class' => 'ButtonColumnSubstitute',
				'template' => '{invite}{invited} &nbsp; {start}{profile}',
				'buttons' => array(
				    'invite' => array(
					//'icon'=>'list',
					'label' => 'Invite',
					'url' => 'Yii::app()->createUrl("company/jobs/invite",array("id"=>$data->idjobsapplied))',
					'options'=>array(
					     'ajax'=>array( // ajax Request for fetching data into modal
						    'type'=>'POST',
						    'url'=>"js:$(this).attr('href')",
						    'success'=>'function(data) { $("#invite").html(data); $("#invite").modal(); }',
						),
					    'class'=>'btn btn-small btn-default',
                                        ),
                                        'visible'=>'($data->checkInvitation($data->idjobsapplied))?false:true'
                                    ),
                                    'invited' => array(
					'label' => '$data->getDropDown($data->idjobsapplied)',
                                        'visible'=>'($data->checkInvitation($data->idjobsapplied))?true:false'
                                    ),
                                    'start'=>array(
                                        'label'=>'Start',
                                        //'url' => 'Yii::app()->createUrl("company/jobs/startChat",array("id"=>$data->idjobsapplied))',
					
                                       // 'url'=>'"http://localhost:2013/?idjobsapplied=".$data->idjobsapplied."&title=".$data->getTitle($data->idjobsapplied)',
                                       'url'=>'Yii::app()->createUrl("webconference/start",array("idjobsapplied"=>$data->idjobsapplied,"title"=>$data->getTitle($data->idjobsapplied)))',
                                       'options'=>array(
//                                            'ajax'=>array( // ajax Request for fetching data into modal
//						    'type'=>'POST',
//						    'url'=>"js:$(this).attr('href')",
//						    'success'=>'function(data) { location.href=data }',
//						),
                                            
                                            'target'=>'_blank','class'=>'btn btn-small btn-default',),
                                        'visible'=>'($data->isOnline($data->idusers0->idusers))?(($data->checkInt($data->idjobsapplied))?true:false):false'
                                    ),
                                    'profile' => array(
					//'icon'=>'list',
					'label' => 'View Profile',
					'url' => 'Yii::app()->createUrl("company/jobs/userProfile",array("idusers"=>$data->idusers))',
					'options'=>array(
					     'ajax'=>array( // ajax Request for fetching data into modal
						    'type'=>'POST',
						    'url'=>"js:$(this).attr('href')",
						    'success'=>'function(data) { $("#profile").html(data); $("#profile").modal(); }',
						),
					    'class'=>'btn btn-small btn-default'
                                        ),
                                         'visible'=>'($data->checkProfile($data->idusers))?true:false'
                                    ),
                                )
                            )
                        )
                 ));
?>
	
	   </div>
      </div>
    </div>
    
</div>
<!--Invite User Modal-->
<div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="updateRelatedLabel" aria-hidden="true" style="display:none;">

</div>

<!--View User Profile-->
<div class="modal fade bs-example-modal-lg" id="profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  
</div>
<script>
setInterval(function(){
    $.fn.yiiGridView.update("Job-grid");
    
}, 30000);
</script>

<?php //CGoogleApi::register('hangouts', '1', array(),'AIzaSyAP1GgDj9dm_552MbgN8B7xgrgOTsBtmO8');?>
