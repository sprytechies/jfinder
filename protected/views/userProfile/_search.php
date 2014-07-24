<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'iduser_profile'); ?>
		<?php echo $form->textField($model, 'iduser_profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'address'); ?>
		<?php echo $form->textField($model, 'address', array('maxlength' => 1028)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pin'); ?>
		<?php echo $form->textField($model, 'pin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'twitter'); ?>
		<?php echo $form->textField($model, 'twitter', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'websites'); ?>
		<?php echo $form->textField($model, 'websites', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'heading'); ?>
		<?php echo $form->textField($model, 'heading', array('maxlength' => 1028)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'keyskills'); ?>
		<?php echo $form->textField($model, 'keyskills', array('maxlength' => 1028)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cv'); ?>
		<?php echo $form->textField($model, 'cv', array('maxlength' => 128)); ?>
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
