<h1>Companies Post Job </h1>
<span class="btn pull-right" style="margin:10px 10px 20px 10px; "><a href="index?r=admin/jobs/create">Add new</a></span>
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
		'template' => '{update}{delete}',
		'buttons' => array(
		    'update' => array(
			'url' => 'Yii::app()->createUrl("admin/jobs/update",array("idjobs"=>$data->idjobs))',
			'label' => 'Update'
			),
                    'Delete' => array(
			'url' => 'Yii::app()->createUrl("admin/jobs/delete",array("idjobs"=>$data->idjobs))',
			'label' => 'Delete'
			),

		    ),
	    )
    )
));


