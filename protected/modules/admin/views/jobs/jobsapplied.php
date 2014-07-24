<h1>Applied to jobs Users list</h1><span class="btn pull-right" style="margin:10px 10px 20px 10px; "><a href="index?r=admin/jobs/create_applied">Add new</a></span>

<?php

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'jobs-grid',
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns'=>array(
	array(
	    'header' =>'name',
	    'value'=>'$data->idusers0->username'
	),
	array(
	    'header' =>'Email',
	    'value'=>'$data->idusers0->email'
	),
	array(
	    'header' =>'Company',
	    'value'=>'$data->idjobs0->idcompany0->name'
	),
	array(
	    'header' =>'Job Title',
	    'value'=>'$data->idjobs0->title'
	),
        array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{update}{delete}',
		'buttons' => array(
		    'update' => array(
			'url' => 'Yii::app()->createUrl("admin/jobs/update_applied",array("idjobsapplied"=>$data->idjobsapplied))',
			'label' => 'Update'
			),
                    'delete' => array(
			'url' => 'Yii::app()->createUrl("admin/jobs/delete_applied",array("idjobsapplied"=>$data->idjobsapplied))',
			'label' => 'Delete '
			),

		    ),
	    )
	
	)
    
    
));
