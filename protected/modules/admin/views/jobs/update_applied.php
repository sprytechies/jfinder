<h2>Update Job Apply</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobs-applied-update_applied-form',
        'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'idjobs'); ?>
		<?php echo $form->dropDownList($model, 'idjobs', GxHtml::listDataEx(Jobs::model()->findAllAttributes(null, true))); ?>
                <?php echo $form->error($model,'idjobs'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'idusers'); ?>
		<?php echo $form->dropDownList($model, 'idusers', GxHtml::listDataEx(Users::model()->findAll($criteria=array('condition'=>'type=1')))); ?>
		<?php echo $form->error($model,'idusers'); ?>
	</div>
		<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary')); ?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->