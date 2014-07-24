<h2>Add new Education Details</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-exp-create_exp-form',
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'from', 
                            'language' => 'eng',
                            
                             'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_from',
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
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'to', 
                            'language' => 'eng',
                            
                             'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_to',
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
		<?php echo $form->error($model,'to'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'cdate'); ?>
		<?php echo $form->textField($model,'cdate'); ?>
		<?php echo $form->error($model,'cdate'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'mdate'); ?>
		<?php echo $form->textField($model,'mdate'); ?>
		<?php echo $form->error($model,'mdate'); ?>
	</div>

	<div class="control-group">
            
		<?php echo $form->labelEx($model,'ongoing'); ?>
		<?php echo $form->textField($model,'ongoing'); ?>
		<?php echo $form->error($model,'ongoing'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company'); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="control-group">
                <?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>


	
		<?php echo CHtml::submitButton('Submit',array('class'=>"btn btn-primary")); ?>
	

<?php $this->endWidget(); ?>

<!-- form -->