<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idedu')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idedu), array('view', 'id' => $data->idedu)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idusers')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idusers0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('degree')); ?>:
	<?php echo GxHtml::encode($data->degree); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('completed')); ?>:
	<?php echo GxHtml::encode($data->completed); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ongoing')); ?>:
	<?php echo GxHtml::encode($data->ongoing); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('cdate')); ?>:
	<?php echo GxHtml::encode($data->cdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mdate')); ?>:
	<?php echo GxHtml::encode($data->mdate); ?>
	<br />
	*/ ?>

</div>