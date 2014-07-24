<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idjobsapplied')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idjobsapplied), array('view', 'id' => $data->idjobsapplied)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idjobs')); ?>:
	<?php echo GxHtml::encode($data->idjobs); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idusers')); ?>:
	<?php echo GxHtml::encode($data->idusers); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cdate')); ?>:
	<?php echo GxHtml::encode($data->cdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mdate')); ?>:
	<?php echo GxHtml::encode($data->mdate); ?>
	<br />

</div>