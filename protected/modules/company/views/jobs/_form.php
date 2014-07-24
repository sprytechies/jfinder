<div class="col-lg-7 width7 right_part">
        <div class="well done m-top1">
	    
          <?php $form = $this->beginWidget('GxActiveForm', array(
				'id' => 'update-form',
				//'enableAjaxValidation' => true,
				'enableClientValidation'=>true,
				'clientOptions' => array(
				    'validateOnSubmit' => true,
//				    'validateOnChange' => true,
//				    'validateOnType' => true
				),
				'htmlOptions'=>array('class'=>'form-horizontal form-jobs'),
			));
			?>
	    <div class="new-ad-body m-top2">

            <form class="form-horizontal form-new-ad" role="form">
            <?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
                <div class="form-group">
                <span class="type light-color">Title :</span>
		<?php echo $form->textField($model, 'title', array('maxlength' => 128, 'placeholder'=>"Ad title", 'class'=>"form-control")); ?>
		<span class="required">*</span> 
		<?php echo $form->error($model,'title'); ?> 
		</div>
		<div class="form">
                    <span class="type light-color">Keyword :</span>
		<?php echo $form->dropDownList($model, 'keywords', array(0=>"Chartered Accountancy",1=>"Computer Engineering",2=>"Company Secretary",3=>"Event Mangement",4=>"Fashion Designing",5=>"Hotel Management",6=>"Mass Communication",7=>"Foreign Languages"),array("class"=>'form-control',"empty"=>'choose your category'));?>
		 
		<?php echo $form->error($model,'keywords'); ?>
                <span class="required">*</span>
		</div>
		<div class="form-group">
                    <span class="type light-color">Description :</span>
		<?php echo $form->textarea($model, 'description', array('maxlength' => 128, 'placeholder'=>"Description", 'class'=>"form-control")); ?>
		<span class="required">*</span> 
		<?php echo $form->error($model,'description'); ?>
		</div>
		<div class="form-group">
                    <span class="type light-color">Location :</span>
		<?php echo $form->textField($model, 'location', array('maxlength' => 128, 'placeholder'=>"Location", 'class'=>"form-control")); ?>
		<span class="required">*</span> 
		<?php echo $form->error($model, 'location'); ?>
		</div>
		<div class="form-group">
		<span class="type light-color">Date:</span>
                
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
		<?php //echo $form->error($model,'datefrom'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'dateto', 
                            'language' => 'eng',
                            
                             'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_dateto',
                                'class' => 'fss-control',
                                'dateFormat' => 'yy-mm-dd H:i:s',
				 "placeholder"=>"To",   
                            ),
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd'
                            ),
                            'defaultOptions' => array(  
                                'showOn' => 'focus', 
                                'dateFormat' => 'yy-mm-dd  H:i:s',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'showButtonPanel' => true,
                            )
                        )
                        );
		?>
                <?php echo $form->error($model,'datefrom')." ".$form->error($model,'dateto'); ?>
                <span class="required">*</span>
		</div>
		<div class="form-group">
		<span class="type light-color">Salary Offered:</span>
		<?php echo $form->textField($model, 'amountfrom', array('maxlength' => 128,"class"=>'fss-control','placeholder'=>'From'));?>
		
		<?php echo $form->textField($model, 'amountto', array('maxlength' => 128,"class"=>'fss-control','placeholder'=>'to'));?>
		<?php echo $form->error($model,'amountfrom');echo $form->error($model,'amountto'); ?>
                <span class="required">*</span>
		</div>
		
		<div class="form-group">
		<span class="type light-color">Job Type:</span>
                    <div class="radio">
                        <label>
                        <?php echo $form->radioButton($model, 'type', array(0=>"parttime"),array("class"=>'form-control')); ?>
                        Full Time
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <?php echo $form->radioButton($model, 'type', array(1=>"fulltime"),array("class"=>'form-control')); ?>
                        Part Time
                        </label>
                    </div>
                
		<?php echo $form->error($model,'type'); ?>
                
                <span class="required"> * </span>
		</div>
	    </div>
	    
		<p class="m-top2">
		<?php echo CHtml::submitButton('Post',array('class'=>'btn btn-default'));?>
		</p>
	<?php
	$this->endWidget();
	?>
    </div>
</div>