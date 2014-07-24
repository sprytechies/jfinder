<div class="col-lg-7 width7 right_part">
        <div class="well done m-top1">
              <h4>Previous Ad</h4>
              <p class="border"></p>
              <div class="m-top2">
            <p><span class="glyphicon glyphicon-list"></span> <span><strong>Previous Ad Details</strong></span></p>
            <div class="table-ad-list">
<?php
$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'Job-grid',
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed hover ',
//    'filter'=>$model,
    'columns'=>array(
	'datefrom',
	'dateto',
	'description',
	array(
		'name'=>'type',
		'value'=>'$data->gettype($data->type)'
	    ),
	'title',
	'amountfrom',
	'amountto',
	array(
		'name'=>'keywords',
		'value'=>'$data->getKeywords($data->keywords)'
	    ),
	'location',
	array(
		'class' => 'bootstrap.widgets.TbButtonColumn',
		//'htmlOptions' => array('style' => 'white-space: nowrap'),
		'template' => '{details}{view}{update}',
		'buttons' => array(
		    'details' => array(
                        'type'=>'html',
                        'icon'=>'resize-full',
			'url' => 'Yii::app()->createUrl("company/jobs/job",array("id"=>$data->idjobs))',

			),
		    'view' => array(
			'url' => 'Yii::app()->createUrl("company/jobs/applied",array("idjobs"=>$data->idjobs))',
			'label' => 'View'
			),
                    'Update' => array(
			'url' => 'Yii::app()->createUrl("company/jobs/update",array("idjobs"=>$data->idjobs))',
			'label' => 'Update'
			),

		    ),
	    )
        )
    ));?>
	   </div>
      </div>
    </div>
</div>
