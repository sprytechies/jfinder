<h1> Step: 2</h1>
<h>Set a Password</h>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'users-changepass-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="form-group">
		<?php echo $form->textField($model, 'password', array('maxlength' => 128,'placeholder'=>'Password','class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<div class="form-group">
		<?php echo $form->textField($model, 'cpassword', array('maxlength' => 128,'placeholder'=>'Confirm Password','class'=>'form-control')); ?>
		<?php echo $form->error($model,'cpassword'); ?>
		</div><!-- row -->
		


<?php
echo GxHtml::submitButton(Yii::t('app', 'Change'));
//echo GxHtml::ajaxButton(Yii::t('app', 'Change Later'),Yii::app()->createUrl('site/changeLater'));
$this->endWidget();
?>
</div><!-- form -->