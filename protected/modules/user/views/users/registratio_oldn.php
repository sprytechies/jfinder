<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'users-form',
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
    <div class="display-t full-width">
        <div class="display-tc coloumn-third align-top">
            <div class="register_photos m-bottom"> <img alt="" src="<?php echo Yii::app()->theme->baseUrl ?>/images/user-photo.jpg"> </div>
            <div class="file_upload">
                <input id="file_upload" type="file" name="file_upload">
            </div>
        </div>
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
        </div>
    </div>
<!------------------User Details Ends-------------------->
    
    <p class="border"></p>
    
<!---------------User Experience Details Starts------------->

    <p><span class="glyphicon glyphicon-credit-card"></span> <span><strong>Professional Background</strong></span></p>
    <div class="display-t full-width">
        <div class="display-tc coloumn-third align-top">
            <p>Your total work experience as of today:</p>
        </div>
        <div class="display-tc userdetails">
            <div class="form-group">
                <select class="form-control">
                <option>Years</option>
                <option>0 &ndash; 1</option>
                </select>
                <select class="form-control">
                <option>Months</option>
                <option>0 &ndash; 1</option>
                </select>
            </div>
        </div>
    </div>
    <p>Your present / past work experiences(s) <br />
    <span class="light-color">Sharing your professional history details will enable you to schedule jFinder more effectively with other professionals.</span></p>
    <div class="past_info">
        <div id='exp'>
            <div class="form-group">
                <?php echo $form->textField($userExp, 'company[]', array('maxlength' => 128, 'placeholder'=>"Company name", 'class'=>"form-control")); ?>
                <span class="required">*</span> 
                <?php echo $form->error($userExp,'company'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($userExp, 'name[]', array('maxlength' => 128, 'placeholder'=>"Job title", 'class'=>"form-control")); ?>
                <span class="required">*</span> 
                <?php echo $form->error($userExp,'name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($userExp, 'location[]', array('maxlength' => 128, 'placeholder'=>"Location", 'class'=>"form-control")); ?>
                <span class="required">*</span> 
                <?php echo $form->error($userExp,'location'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->dropDownList($userExp, 'from[]',array('0'=>'0 - 1'),array('class'=>"form-control",'empty'=>'Time Period From (years)')); ?>
                <?php echo $form->dropDownList($userExp, 'to[]',array('0'=>'0 - 1'),array('class'=>"form-control",'empty'=>'Time Period To (years)')); ?>
                <div class="checkbox">
                    <label>
                          <?php echo $form->checkBox($userExp, 'ongoing[]'); ?>
                          Currently work here
                    </label>
                </div>
            </div>
            <div class="form-group">
                <?php //echo $form->dropDownList($userExp, 'from',array('0'=>'Industry','2'=>'Administrator','3'=>'Marketing'),array('class'=>"form-control industry")); ?>
                <select class="form-control industry">
                    <option>Industry</option>
                    <option>Administrator</option>
                    <option>Marketing</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Your work e-mail">
                <?php //echo $form->textField($userExp, 'email', array('maxlength' => 128, 'placeholder'=>"Your work e-mail", 'class'=>"form-control")); ?>
                <span class="required">*</span> 
                <?php //echo $form->error($userExp,'email'); ?>
            </div>
        </div>
        <?php 
        // Multimodel form for user experience fields
        $userExpFormConfig = array(
            'elements'=>array(
            'company'=>array(
                'type'=>'text',
                'maxlength'=>128,
                'class'=>'form-control',
                'placeholder'=>'Company name'
            ),
            'name'=>array(
                'type'=>'text',
                'maxlength'=>128,
                'class'=>'form-control',
                'placeholder'=>'Job title'
            ),
            'location'=>array(
                'type'=>'text',
                'maxlength'=>128,
                'class'=>'form-control',
                'placeholder'=>'Location'
            ),
            'from'=>array(
                'type'=>'dropdownlist',
                'class'=>'form-control',
                'items'=>array(''=>'Time Period From (years)','0-1'=>'0-1'),
            ),
            'to'=>array(
                'type'=>'dropdownlist',
                'class'=>'form-control',
                'items'=>array(''=>'Time Period To (years)','0-1'=>'0-1'),
            ),
            'ongoing'=>array(
                'type'=>'checkboxlist',
                'items'=>array('1'=>'1'),
                'class'=>'form-control'
            ),
        ));
        $this->widget('ext.multimodelform.MultiModelForm',array(
            'id' => 'id_userExp', //the unique widget id
            'formConfig' => $userExpFormConfig, //the form configuration array
            'model' => $userExp, //instance of the form model

            //if submitted not empty from the controller,
            //the form will be rendered with validation errors
            'validatedItems' => $validatedMembersExp,
            'fieldsetWrapper' => array('tag' => 'div', 'htmlOptions' => array('class' => 'form-group')),
            'bootstrapLayout' => true,
            'addItemText'=>'Add More Experience',
            'removeText'=>'Remove',
            //array of member instances loaded from db
            'data' => $userExp->findAll('idusers=:idusers', array(':idusers'=>$users->idusers)),
        ));
        ?>
<!--        <div id='exp-append'></div>
        <p> <a class="addmore_btn" href="javascript:void(0)" id="addmore_exp">Add More Experience</a></p>-->
<!------------------User Experience Details Ends-------------->
        
<!------------------User Education Details Starts-------------->

        <p class="m-top2"><span class="glyphicon glyphicon-book"></span> <span><strong>Your Education</strong></span></p>
        <div id="edu">
            <div class="form-group">
                <?php echo $form->textField($userEdu, 'name[]', array('maxlength' => 128, 'placeholder'=>"School name", 'class'=>"form-control")); ?>
                <span class="required">*</span> 
                <?php echo $form->error($userEdu,'name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($userEdu, 'degree[]', array('maxlength' => 128, 'placeholder'=>"Degree", 'class'=>"form-control")); ?>
                <span class="required">*</span> 
                <?php echo $form->error($userEdu,'degree'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->dropDownList($userEdu, 'completed[]',array('2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013'),array('class'=>"form-control",'empty'=>'Graduated In (years)')); ?>
                <div class="checkbox">
                        <label>
                            <?php echo $form->checkBox($userEdu, 'ongoing[]'); ?>
                            Currently studying here
                        </label>
                </div>
            </div>
        </div>
        <?php
        // Multimodel form for user Education fields

        $userEduFormConfig = array(
              'elements'=>array(
                'name'=>array(
                    'type'=>'text',
                    'maxlength'=>128,
                    'class'=>"form-control",
                     'placeholder'=>'School'
                ),
                'degree'=>array(
                    'type'=>'text',
                    'maxlength'=>128,
                    'class'=>"form-control",
                     'placeholder'=>'Degree'
                ),
                'completed'=>array(
                    'type'=>'dropdownlist',
                    'class'=>"form-control",
                    //it is important to add an empty item because of new records
                    'items'=>array(''=>'Graduated In (years)',2009=>2009,2010=>2010,2011=>2011,),
                ),
                'ongoing'=>array(
                    'type'=>'checkBox',
                ),
        ));
        $this->widget('ext.multimodelform.MultiModelForm',array(
                    'id' => 'id_userEdu', //the unique widget id
                    'formConfig' => $userEduFormConfig, //the form configuration array
                    'model' => $userEdu, //instance of the form model

                    //if submitted not empty from the controller,
                    //the form will be rendered with validation errors
                    'validatedItems' => $validatedMembersEdu,
                    'bootstrapLayout' => true,
                    'fieldsetWrapper' => array('tag' => 'div', 'htmlOptions' => array('class' => 'form-group')),
                    'addItemText'=>'Add More Education',
                    'removeText'=>'Remove',
                    //array of member instances loaded from db
                    'data' => $userEdu->findAll('idusers=:idusers', array(':idusers'=>$users->idusers)),
                ));
        ?>
        
        
<!--        <div id='edu-append'></div>
        <p><a class="addmore_btn" href="javascript:void(0)" id="addmore_edu">Add More Education</a></p>-->
        <p class="m-top2">
            <?php echo CHtml::submitButton('Save Details & Create Account',array('class'=>'btn btn-default'));?>
        </p>
<!------------------User Education Details Ends-------------->

</div>
    <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
        
<?php 
$this->endWidget();
?>

