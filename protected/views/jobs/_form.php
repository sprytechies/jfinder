<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'jobs-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idjobs'); ?>
		<?php echo $form->textField($model, 'idjobs'); ?>
		<?php echo $form->error($model,'idjobs'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model, 'from', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'from'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo $form->textField($model, 'to', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'to'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model, 'description', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'amountfrom'); ?>
		<?php echo $form->textField($model, 'amountfrom', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'amountfrom'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'amountto'); ?>
		<?php echo $form->textField($model, 'amountto', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'amountto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model, 'keywords', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'keywords'); ?>
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
		<div class="row">
		<?php echo $form->labelEx($model,'confirmation'); ?>
		<?php echo $form->textField($model, 'confirmation', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'confirmation'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->