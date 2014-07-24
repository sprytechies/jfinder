<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-profile-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'iduser_profile'); ?>
		<?php echo $form->textField($model, 'iduser_profile'); ?>
		<?php echo $form->error($model,'iduser_profile'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 16)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'country'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'state'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model, 'address', array('maxlength' => 1028)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pin'); ?>
		<?php echo $form->textField($model, 'pin'); ?>
		<?php echo $form->error($model,'pin'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'twitter'); ?>
		<?php echo $form->textField($model, 'twitter', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'twitter'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'websites'); ?>
		<?php echo $form->textField($model, 'websites', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'websites'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'heading'); ?>
		<?php echo $form->textField($model, 'heading', array('maxlength' => 1028)); ?>
		<?php echo $form->error($model,'heading'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'keyskills'); ?>
		<?php echo $form->textField($model, 'keyskills', array('maxlength' => 1028)); ?>
		<?php echo $form->error($model,'keyskills'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cv'); ?>
		<?php echo $form->textField($model, 'cv', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'cv'); ?>
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