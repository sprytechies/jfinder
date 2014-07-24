<h1> All Categories</h1>
<span class="btn pull-right" style="margin:10px 10px 20px 10px; "><a href="index?r=admin/jobTerms/create_category">Add new</a></span>

<?php

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'category-grid',
    'dataProvider'=>  $model->searchCategory(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns'=>array(
        'idterms',
	'name',
        'slug',
        'parent',
            array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{update}{delete}',
		'buttons' => array(
		    'update' => array(
			'url' => 'Yii::app()->createUrl("admin/jobTerms/update_category",array("idjobterms"=>$data->idjobterms,"idterms"=>$data->idterms))',
			'label' => 'Update'
			),
                    'delete' => array(
			'url' => 'Yii::app()->createUrl("admin/jobTerms/delete_category",array("idjobterms"=>$data->idjobterms))',
			'label' => 'Delete'
			),

		    ),
	    )
        ),
    
));

//print_r($model_data->username);
