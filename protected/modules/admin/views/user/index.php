<h1> Hi Users</h1>
<span class="btn btn-primary pull-right" style="margin:10px 10px 20px 10px; "><a href="index?r=admin/user/create">Add new</a></span>

<?php
$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'user-grid',
    'dataProvider'=>$model->searchNormal_User(),
    'type'=>'striped bordered condensed hover ',
    'filter'=>$model,
    'columns'=>array(
	'username',
        'email',
            array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{update}{delete}',
		'buttons' => array(
		    'update' => array(
			'url' => 'Yii::app()->createUrl("admin/user/update",array("idusers"=>$data->idusers))',
			'label' => 'Update'
			),
                    'Delete' => array(
			'url' => 'Yii::app()->createUrl("admin/user/delete",array("idusers"=>$data->idusers))',
			'label' => 'Delete'
			),

		    ),
	    )
        ),
));
