<h1>All User invited by the Company for a Job</h1><span class="btn pull-right" style="margin:10px 10px 20px 10px; "><a href="index?r=admin/jobs/create_invites">Add new</a></span>
<?php

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'jobs-grid',
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns'=>array(
	array(
	    'header' =>'Name',
	    'value'=>'$data->idjobsapplied0->idusers0->username'
	),
	array(
	    'header' =>'Job Title',
	    'value'=>'$data->idjobsapplied0->idjobs0->title'
	),
	array(
	    'header' =>'Company Name',
	    'value'=>'$data->idjobsapplied0->idjobs0->idcompany0->name'
	),
	'description',
        'invitedon',
        array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{update}{delete}',
		'buttons' => array(
		    'update' => array(
			'url' => 'Yii::app()->createUrl("admin/jobs/update_invited",array("idjobinvites"=>$data->idjobinvites))',
			'label' => 'Update'
			),
                    'delete' => array(
			'url' => 'Yii::app()->createUrl("admin/jobs/delete_invited",array("idjobinvites"=>$data->idjobinvites))',
			'label' => 'Delete '
			),

		    ),
	    )
	),
));

