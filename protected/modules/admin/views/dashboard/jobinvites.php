<h1>All User invited by the Company for a Job</h1>
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
	
	),
));

