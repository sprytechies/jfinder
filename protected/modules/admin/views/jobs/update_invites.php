<h2>Update Job Invites</h2>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-invites-create_invites-form',
        'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'invitedon'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'invitedon', 
                            'language' => 'eng',
                            
                             'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_invitedon',
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
		<?php echo $form->error($model,'invitedon'); ?>
	</div>
        

	<div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'idjobsapplied'); ?>
		<?php echo $form->dropDownList($model, 'idjobsapplied', GxHtml::listDataEx(JobsApplied::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idjobsapplied'); ?>
	</div>
            <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary')); ?>
	

<?php $this->endWidget(); ?>
<!-- form -->