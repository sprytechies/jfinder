<h2>Create Tag</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-terms-crete_category-form',
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'jobs'); ?>
		<?php echo $form->dropDownList($model, 'idjobs', GxHtml::listDataEx(Jobs::model()->findAllAttributes(null, true))); ?>
                <?php echo $form->error($model,'idjobs'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model_terms,'Name'); ?>
		<?php echo $form->textField($model_terms,'name'); ?>
		<?php echo $form->error($model_terms,'name'); ?>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model_terms,'slug'); ?>
		<?php echo $form->textField($model_terms,'slug'); ?>
		<?php echo $form->error($model_terms,'slug'); ?>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model_terms,'Parent tag'); ?>
		<?php echo $form->dropDownList($model_terms,'parent',GxHtml::listDataEx(Terms::model()->findAll($criteria=array('condition'=>'type=2')),'idterms','name')); ?>
		<?php echo $form->error($model_terms,'parent'); ?>
	</div>
            <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->