<h2>Add New Meta</h2><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'create_company-form',
	'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'Company'); ?>
		<?php echo $form->dropDownList($model, 'idcompany', GxHtml::listDataEx(Companies::model()->findAllAttributes(null, true))); ?>		
		<?php echo $form->error($model,'idcompany'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'meta_name'); ?>
		<?php echo $form->textField($model,'meta_name'); ?>
		<?php echo $form->error($model,'meta_name'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'meta_value'); ?>
		<?php echo $form->textField($model,'meta_value'); ?>
		<?php echo $form->error($model,'meta_value'); ?>
	</div>
        
		<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary')); ?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->