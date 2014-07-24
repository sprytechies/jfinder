<h2>Update Education Details</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-edu-update_edu-form',
	'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		
		<div class="control-group">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="control-group">
		<?php echo $form->labelEx($model,'degree'); ?>
		<?php echo $form->textField($model, 'degree', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'degree'); ?>
		</div><!-- row -->
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
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model, 'description', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
                
                <div class="control-group">
		<?php echo $form->labelEx($model,'ongoing'); ?>
		<?php echo $form->textField($model, 'ongoing', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'ongoing'); ?>
		</div><!-- row -->
               
		


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'),array('class'=>'btn btn-primary'));
$this->endWidget();
?>
<!-- form -->