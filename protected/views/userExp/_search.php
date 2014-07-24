<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idexp'); ?>
		<?php echo $form->textField($model, 'idexp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idusers'); ?>
		<?php echo $form->dropDownList($model, 'idusers', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'company'); ?>
		<?php echo $form->textField($model, 'company', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'location'); ?>
		<?php echo $form->textField($model, 'location', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
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
		<?php echo $form->label($model, 'ongoing'); ?>
		<?php echo $form->textField($model, 'ongoing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cdate'); ?>
		<?php echo $form->textField($model, 'cdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mdate'); ?>
		<?php echo $form->textField($model, 'mdate'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
