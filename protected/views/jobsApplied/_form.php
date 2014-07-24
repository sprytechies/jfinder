<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'jobs-applied-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idjobsapplied'); ?>
		<?php echo $form->textField($model, 'idjobsapplied', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'idjobsapplied'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idjobs'); ?>
		<?php echo $form->textField($model, 'idjobs', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'idjobs'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idusers'); ?>
		<?php echo $form->textField($model, 'idusers', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'idusers'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cdate'); ?>
		<?php echo $form->textField($model, 'cdate', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'cdate'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'mdate'); ?>
		<?php echo $form->textField($model, 'mdate', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'mdate'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->