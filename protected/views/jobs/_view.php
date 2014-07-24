<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idjobs')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idjobs), array('view', 'id' => $data->idjobs)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('from')); ?>:
	<?php echo GxHtml::encode($data->from); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('to')); ?>:
	<?php echo GxHtml::encode($data->to); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title')); ?>:
	<?php echo GxHtml::encode($data->title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('amountfrom')); ?>:
	<?php echo GxHtml::encode($data->amountfrom); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('amountto')); ?>:
	<?php echo GxHtml::encode($data->amountto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('keywords')); ?>:
	<?php echo GxHtml::encode($data->keywords); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cdate')); ?>:
	<?php echo GxHtml::encode($data->cdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mdate')); ?>:
	<?php echo GxHtml::encode($data->mdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('confirmation')); ?>:
	<?php echo GxHtml::encode($data->confirmation); ?>
	<br />
	*/ ?>

</div>