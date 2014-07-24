<h2>Add New User</h2><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'create_user-form',
	'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		 <div class="control-group">
		<?php echo $form->labelEx($model,'Company'); ?>
		<?php echo $form->dropDownList($model_compUser, 'idcompanies', GxHtml::listDataEx(Companies::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idcompaies'); ?>
		</div><!-- row -->
		
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
		<?php echo $form->dropDownList($model, 'status',array("0"=>"inactive","1"=>"active")); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'),array('class'=>'btn btn-primary'));
$this->endWidget();
?>
<!-- form -->