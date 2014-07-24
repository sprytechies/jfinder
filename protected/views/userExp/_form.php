<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-exp-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idusers'); ?>
		<?php echo $form->dropDownList($model, 'idusers', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idusers'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model, 'company', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'company'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model, 'location', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'location'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model, 'from'); ?>
		<?php echo $form->error($model,'from'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo $form->textField($model, 'to'); ?>
		<?php echo $form->error($model,'to'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ongoing'); ?>
		<?php echo $form->textField($model, 'ongoing'); ?>
		<?php echo $form->error($model,'ongoing'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cdate'); ?>
		<?php echo $form->textField($model, 'cdate'); ?>
		<?php echo $form->error($model,'cdate'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'mdate'); ?>
		<?php echo $form->textField($model, 'mdate'); ?>
		<?php echo $form->error($model,'mdate'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->