<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'company-users-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idcompany_users'); ?>
		<?php echo $form->textField($model, 'idcompany_users'); ?>
		<?php echo $form->error($model,'idcompany_users'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idcompanies'); ?>
		<?php echo $form->textField($model, 'idcompanies', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'idcompanies'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idusers'); ?>
		<?php echo $form->textField($model, 'idusers', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'idusers'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->