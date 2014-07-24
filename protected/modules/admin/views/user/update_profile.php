<h2>Update Profile </h2><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-update_profile-form',
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
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'Phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'Country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'country'); ?>
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'state'); ?>
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'Address'); ?>
		<?php echo $form->textField($model, 'address', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'Key skills'); ?>
		<?php echo $form->textField($model, 'keyskills', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'keyskills'); ?>
		</div><!-- row -->
                <div class="control-group">
		<?php echo $form->labelEx($model,'pin'); ?>
		<?php echo $form->textField($model, 'pin', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'pin'); ?>
		</div><!-- row -->
                 <div class="control-group">
		<?php echo $form->labelEx($model,'cv'); ?>
		<?php echo $form->textField($model, 'cv', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'cv'); ?>
		</div>


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'),array('class'=>'btn btn-primary'));
$this->endWidget();
?>
<!-- form -->