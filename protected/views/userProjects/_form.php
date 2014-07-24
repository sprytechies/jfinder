<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-projects-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idprojects'); ?>
		<?php echo $form->textField($model, 'idprojects'); ?>
		<?php echo $form->error($model,'idprojects'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model, 'url', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'url'); ?>
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model, 'position', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'position'); ?>
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
		<div class="row">
		<?php echo $form->labelEx($model,'ongoing'); ?>
		<?php echo $form->textField($model, 'ongoing'); ?>
		<?php echo $form->error($model,'ongoing'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->