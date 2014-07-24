<h2>Add new Education Details</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-edu-create_edu-form',
	'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="control-group">
		<?php echo $form->labelEx($model,'idusers'); ?>
		<?php echo $form->dropDownList($model, 'idusers', GxHtml::listDataEx(Users::model()->findAll($criteria=array('condition'=>'type=1')))); ?>
		<?php echo $form->error($model,'idusers'); ?>
		</div><!-- row -->
        <div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'degree'); ?>
		<?php echo $form->textField($model,'degree'); ?>
		<?php echo $form->error($model,'degree'); ?>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'completed'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'completed', 
                            'language' => 'eng',
                            
                             'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_completed',
                                'class' => 'fss-control',
                                'dateFormat' => 'yy-mm-dd',
				"placeholder"=>"From"

                            ),
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd '
                            ),
                            'defaultOptions' => array(  
                                'showOn' => 'focus', 
                                'dateFormat' => 'yy-mm-dd H:i:s',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'showButtonPanel' => true,
                            )
                        ));
		?>
		<?php echo $form->error($model,'completed'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'ongoing'); ?>
		<?php echo $form->textField($model,'ongoing'); ?>
		<?php echo $form->error($model,'ongoing'); ?>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
                
		<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary')); ?>
	

<?php $this->endWidget(); ?>

<!-- form -->