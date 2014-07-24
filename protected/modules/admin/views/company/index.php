<h1>Company</h1>
<span class="btn pull-right" style="margin:10px 10px 20px 10px; "><a href="index?r=admin/company/create">Add new</a></span>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns' => array(
        'name',
	'url',
	'country',
	'description',
	'state',
        'city',
	'address',
	'pin',
        'phone',
	'person',
        array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{update}{delete}',
		'buttons' => array(
		    'update' => array(
			'url' => 'Yii::app()->createUrl("admin/company/update",array("idcompanies"=>$data->idcompanies))',
			'label' => 'Update'
			),
                    'Delete' => array(
			'url' => 'Yii::app()->createUrl("admin/company/delete",array("idcompanies"=>$data->idcompanies))',
			'label' => 'Delete'
			),

		    ),
	    )
     )	
));
