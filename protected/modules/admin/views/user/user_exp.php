<h1> Hi Users</h1>
<span class="btn pull-right" style="margin:10px 10px 20px 10px; "><a href="index?r=admin/user/create_exp">Add new</a></span>

<?php

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'user-grid',
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns'=>array(
	array('header'=>'Username',
	      'value'=>'$data->idusers0()->username'
	),
	array('header'=>'email',
	      'value'=>'$data->idusers0()->email'
	),
        'company',
        'name',
        'location',
        'description',
        'from',
        'to',
        'ongoing',
            array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{update}{delete}',
		'buttons' => array(
		    'update' => array(
			'url' => 'Yii::app()->createUrl("admin/user/update_exp",array("idexp"=>$data->idexp))',
			'label' => 'Update'
			),
                    'delete' => array(
			'url' => 'Yii::app()->createUrl("admin/user/delete_exp",array("idexp"=>$data->idexp))',
			'label' => 'Delete'
			),

		    ),
	    )
        ),
    
));

//print_r($model_data->username);
