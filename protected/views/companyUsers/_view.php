<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idcompany_users')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idcompany_users), array('view', 'id' => $data->idcompany_users)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idcompanies')); ?>:
	<?php echo GxHtml::encode($data->idcompanies); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idusers')); ?>:
	<?php echo GxHtml::encode($data->idusers); ?>
	<br />

</div>