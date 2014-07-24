<h2>Create Job </h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobs-create-form',
    'enableAjaxValidation'=>false,
),array('class'=>'form-horizontal')); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'idcompany'); ?>
		<?php echo $form->dropDownList($model,'idcompany', GxHtml::listDataEx(Companies::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idcompany'); ?>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	

	<div class="control-group">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->dropDownList($model, 'keywords', array(0=>"Chartered Accountancy",1=>"Computer Engineering",2=>"Company Secretary",3=>"Event Mangement",4=>"Fashion Designing",5=>"Hotel Management",6=>"Mass Communication",7=>"Foreign Languages"),array("class"=>'form-control',"empty"=>'choose category')); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textarea($model,'description',array('maxlength' => 128, 'placeholder'=>"Description", 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'datefrom'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'datefrom', 
                            'language' => 'eng',
                            
                             'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_datefrom',
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
		<?php echo $form->error($model,'datefrom'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'dateto'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'dateto', 
                            'language' => 'eng',
                            
                             'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_dateto',
                                'class' => 'fss-control',
                                'dateFormat' => 'yy-mm-dd',
				"placeholder"=>"To"

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
		<?php echo $form->error($model,'dateto'); ?>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'amountfrom'); ?>
		<?php echo $form->textField($model,'amountfrom'); ?>
		<?php echo $form->error($model,'amountfrom'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'amountto'); ?>
		<?php echo $form->textField($model,'amountto'); ?>
		<?php echo $form->error($model,'amountto'); ?>
	</div>

	
        <div class="control-group">
		<?php echo $form->labelEx($model,'type'); ?>
		<div class="radio">
                        <label>
                        <?php echo $form->radioButton($model, 'type', array(0=>"fulltime"),array("class"=>'form-control','name'=>'type')); ?>
                        Full Time
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <?php echo $form->radioButton($model, 'type', array(1=>"parttime"),array("class"=>'form-control','name'=>'type')); ?>
                        Part Time
                        </label>
                    </div>
		<?php echo $form->error($model,'type'); ?>
	</div>

		<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary')); ?>
	

<?php $this->endWidget(); ?>

<!-- form -->