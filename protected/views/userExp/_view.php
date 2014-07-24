<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idexp')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idexp), array('view', 'id' => $data->idexp)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idusers')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idusers0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('company')); ?>:
	<?php echo GxHtml::encode($data->company); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('location')); ?>:
	<?php echo GxHtml::encode($data->location); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from')); ?>:
	<?php echo GxHtml::encode($data->from); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('to')); ?>:
	<?php echo GxHtml::encode($data->to); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ongoing')); ?>:
	<?php echo GxHtml::encode($data->ongoing); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cdate')); ?>:
	<?php echo GxHtml::encode($data->cdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mdate')); ?>:
	<?php echo GxHtml::encode($data->mdate); ?>
	<br />
	*/ ?>

</div>