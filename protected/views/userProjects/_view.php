<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idprojects')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idprojects), array('view', 'id' => $data->idprojects)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('url')); ?>:
	<?php echo GxHtml::encode($data->url); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from')); ?>:
	<?php echo GxHtml::encode($data->from); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('to')); ?>:
	<?php echo GxHtml::encode($data->to); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('position')); ?>:
	<?php echo GxHtml::encode($data->position); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('cdate')); ?>:
	<?php echo GxHtml::encode($data->cdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mdate')); ?>:
	<?php echo GxHtml::encode($data->mdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ongoing')); ?>:
	<?php echo GxHtml::encode($data->ongoing); ?>
	<br />
	*/ ?>

</div>