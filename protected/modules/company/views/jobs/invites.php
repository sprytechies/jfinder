
	
<?php
//Yii::app()->clientScript->registerScript('re-install-date-picker', "
//function reinstallDatePicker(id, data) {
//      $('#datepicker_for_invitedon').datepicker({ dateFormat: 'yy-mm-dd' });
//       $('#datepicker_for_invitedon').datepicker('option', 'dateFormat', 'yy-mm-dd');
//        var start = $('#datepicker_for_invitedon').val();
//        $('#datepicker_for_invitedon' ).datepicker( 'setDate', start );
//    $('#datepicker_for_invitedon').datepicker();
//    $('#datepicker_for_invitedon').datepicker();
//}
//",CClientScript::POS_END);
?>
    <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="groupMemberLabel">Create Invitation</h4>
       </div>
	<?php $form = $this->beginWidget('GxActiveForm', array(
				'id' => 'job-form',
				'enableAjaxValidation' => false,
				'enableClientValidation'=>true,
				'clientOptions' => array(
				    'validateOnSubmit' => true,
				    'validateOnChange' => true,
				    'validateOnType' => true
				),
				'htmlOptions'=>array('class'=>'form-horizontal form-jobs'),
			));
			?>
       <div class="modal-body">
                <div class="form-group">
		<?php echo $form->textField($model, 'title', array( 'placeholder'=>"Title", 'class'=>"form-control")); ?>
		<span class="required">*</span> 
		<?php echo $form->error($model,'title'); ?>
		</div>
		<div class="form-group">
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
                            'attribute'=>'invitedon', 
                            'language' => 'eng',
                            
                            'i18nScriptFile' => 'jquery.ui.datepicker-eng.js', 
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_invitedon',
                                'class' => 'form-control',
                                'dateFormat' => 'yy-mm-dd',
				"placeholder"=>"Date",
				//"value"=>""

                            ),
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd ',
                            ),
                            'defaultOptions' => array(  
                                'showOn' => 'focus', 
                                //'dateFormat' => 'yy-mm-dd H:i:s',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'showButtonPanel' => true,
                            )
                        ));
		?>
                <span class="required">*</span> 
		<?php echo $form->error($model,'invitedon'); ?>
		</div>    
		
		<div class="form-group">
		<?php echo $form->textarea($model, 'description', array('maxlength' => 128, 'placeholder'=>"Description", 'class'=>"form-control")); ?>
		<span class="required">*</span> 
		<?php echo $form->error($model,'description'); ?>
		</div>
      </div>
      <div class="modal-footer">
	    <?php echo CHtml::submitButton('Invite',array('class'=>'btn btn-default'));?>
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
		
<?php
$this->endWidget();
?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
		

