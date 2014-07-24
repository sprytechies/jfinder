
    <h2>Create new User</h2>
<div class="form-horizontal">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'users-form',
	'enableAjaxValidation' => false,
),array('class'=>'form-horizontal'));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		
		<div class="control-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="control-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<div class="control-group">
		<?php echo $form->labelEx($model,'cpassword'); ?>
		<?php echo $form->passwordField($model, 'cpassword', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'cpassword'); ?>
		</div><!-- row -->
		
		<div class="control-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status',array('0'=>'inactive','1'=>'active')); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'),array('class'=>'btn btn-primary pull-left','style'=>'margin-top:10px;'));
$this->endWidget();
?>
</div><!-- form -->
