<h1>All Job List</h1>
<?php

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'jobs-grid',
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns'=>array(
	'title',
	array('header'=>'Keywords',
	      'value'=>'$data->getKeywords($data->keywords)'
	),
	'description',
	array('header'=>'Type',
	      'value'=>'$data->gettype($data->type)'
	),
	'location',
	'amountfrom',
	'amountto',
	'datefrom',
	'dateto',
        array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{view}',
		'buttons' => array(
		    'view' => array(
			'url' => 'Yii::app()->createUrl("admin/jobs/view_statistics",array("idjobs"=>$data->idjobs))',
			'label' => 'View statistics'
			),
                    

		    ),
	    )
    )
));


