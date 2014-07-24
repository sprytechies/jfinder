<h2>Update User</h2><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'create_user-form',
	'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>
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
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status',array("0"=>"inactive","1"=>"active")); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'),array('class'=>'btn btn-primary'));
$this->endWidget();
?>
<!-- form -->