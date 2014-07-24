<h1>Companies Post Job</h1>
<?php

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'jobs-grid',
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns'=>array(
	array('header'=>'Title',
	      'value'=>'$data->title'
	),
	array('header'=>'Keywords',
	      'value'=>'$data->keywords'
	),
	array('header'=>'Description',
	      'value'=>'$data->description'
	),
	array('header'=>'Type',
	      'value'=>'$data->type'
	),
	array('header'=>'Location',
	      'value'=>'$data->location'
	),
	array('header'=>'Amountfrom',
	      'value'=>'$data->amountfrom'
	),
	array('header'=>'Amountto',
	      'value'=>'$data->amountto'
	),
	array('header'=>'Datefrom',
	      'value'=>'$data->datefrom'
	),
	array('header'=>'Dateto',
	      'value'=>'$data->dateto'
	),
    )
));


