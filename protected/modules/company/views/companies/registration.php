<h1>Company Registration</h1>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'companies-form',
	'enableAjaxValidation' => false,
        'enableClientValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
            'validateOnType' => true
        ),
        'htmlOptions'=>array('class'=>'form-horizontal form-signup'),
));
?>
<!---------------User Details Starts---------------->
<div class="form">
    <div class="display-t full-width">
       <div class="display-tc userdetails">
		<div class="form-group">
		    <?php echo $form->textField($users, 'email', array('maxlength' => 128, 'placeholder'=>"Login E-mail", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($users,'email'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->passwordField($users, 'password', array('maxlength' => 128, 'placeholder'=>"Choose your password", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($users,'password'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->passwordField($users, 'cpassword', array('maxlength' => 128, 'placeholder'=>"Confirm password", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($users,'cpassword'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->textField($companies, 'name', array('maxlength' => 128, 'placeholder'=>"Name", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($companies,'name'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->textField($companies, 'country', array('maxlength' => 128, 'placeholder'=>"Country", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($companies,'country'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->textField($companies, 'state', array('maxlength' => 128, 'placeholder'=>"State", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($companies,'state'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->textField($companies, 'city', array('maxlength' => 128, 'placeholder'=>"City", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($companies,'city'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->textField($companies, 'pin', array('maxlength' => 128, 'placeholder'=>"Pin Code", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($companies,'pin'); ?>
		</div>
		<div class="form-group">
		    <?php echo $form->textField($companies, 'phone', array('maxlength' => 128, 'placeholder'=>"Phone Number", 'class'=>"form-control")); ?>
		    <span class="required">*</span> 
		    <?php echo $form->error($companies,'phone'); ?>
		</div>
	    </div>
     </div>
	    <p class="m-top2">
            <?php echo CHtml::submitButton('Registration',array('class'=>'btn btn-default'));?>
        </p>
</div>
<!------------------User Details Ends-------------------->

<?php 
$this->endWidget();
?>
