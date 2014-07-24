<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idcompany_users'); ?>
		<?php echo $form->textField($model, 'idcompany_users'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idcompanies'); ?>
		<?php echo $form->textField($model, 'idcompanies', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idusers'); ?>
		<?php echo $form->textField($model, 'idusers', array('maxlength' => 45)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
