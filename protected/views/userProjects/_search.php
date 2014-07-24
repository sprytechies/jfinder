<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idprojects'); ?>
		<?php echo $form->textField($model, 'idprojects'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'url'); ?>
		<?php echo $form->textField($model, 'url', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from'); ?>
		<?php echo $form->textField($model, 'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to'); ?>
		<?php echo $form->textField($model, 'to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'position'); ?>
		<?php echo $form->textField($model, 'position', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cdate'); ?>
		<?php echo $form->textField($model, 'cdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mdate'); ?>
		<?php echo $form->textField($model, 'mdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ongoing'); ?>
		<?php echo $form->textField($model, 'ongoing'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
