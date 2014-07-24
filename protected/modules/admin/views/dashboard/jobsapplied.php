<h1>Applied to jobs Users list</h1>
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
	
	)
    
));
