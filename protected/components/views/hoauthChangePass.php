<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-pass-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                ),
        )); 
      ?>  
        <div class="modal-body">


          <div class="row">
                  <?php //echo $form->labelEx($model,'username'); ?>
                  <?php echo $form->textField($model,'username',array('placeholder'=>'username')); ?>
                  <?php echo $form->error($model,'username'); ?>
          </div>

          <div class="row">
                  <?php //echo $form->labelEx($model,'password'); ?>
                  <?php echo $form->passwordField($model,'password',array('placeholder'=>'password')); ?>
                  <?php echo $form->error($model,'password'); ?>
          </div>

          <div class="row rememberMe">
                  <?php echo $form->checkBox($model,'rememberMe'); ?>
                  <?php echo $form->label($model,'rememberMe'); ?>
                  <?php echo $form->error($model,'rememberMe'); ?>
          </div>

          <div class="row buttons">
                  <?php echo CHtml::submitButton('Login'); ?>
          </div>
          <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <?php echo CHtml::ajaxSubmitButton('Change',Yii::app()->createUrl('user/users/hoauthChangepass')); ?>
        </div>
      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>