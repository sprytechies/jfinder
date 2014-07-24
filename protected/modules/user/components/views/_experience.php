<?php 
// Multimodel form for user experience fields
$userExpFormConfig = array(
        'elements'=>array(
        'company'=>array(
            'type'=>'text',
            'maxlength'=>128,
            'class'=>'form-control',
            'placeholder'=>'Company name',

        ),
        'name'=>array(
            'type'=>'text',
            'maxlength'=>128,
            'class'=>'form-control',
            'placeholder'=>'Job title',
        ),
        'location'=>array(
            'type'=>'text',
            'maxlength'=>128,
            'class'=>'form-control ',
            'placeholder'=>'Location'
        ),
        'description'=>array(
            'type'=>'textarea',
            'class'=>'form-control',
            'placeholder'=>'Description'
       ),    
        'from'=>array(
            'type'=>'dropdownlist',
            'class'=>'form-control rss r-width',
            'items'=>array(''=>'Time Period From (years)','0-1'=>'0-1'),
        ),
        'to'=>array(
            'type'=>'dropdownlist',
            'class'=>'form-control rss r-width',
            'items'=>array(''=>'Time Period To (years)','0-1'=>'0-1'),
        ),
        'ongoing'=>array(
            'type'=>'checkboxlist',
            'items'=>array('0'=>'Currently work here',),
            'class'=>'form-control rss r-width',
       ),
));
$this->widget('ext.multimodelform.MultiModelForm',array(
        'id' => 'id_userExp', //the unique widget id
        'formConfig' => $userExpFormConfig, //the form configuration array
        'model' => $userExp, //instance of the form model

        //if submitted not empty from the controller,
        //the form will be rendered with validation errors
        'validatedItems' => $validatedMembersExp,
        'fieldsetWrapper' => array('tag' => 'div', 'htmlOptions' => array('class' => 'form-group id_userExp_copy')),
        'bootstrapLayout' => true,
        'addItemText'=>'<span class="glyphicon glyphicon-plus"></span> Add More ',
        'removeText'=>'<span class="glyphicon glyphicon-remove"></span>',
        //array of member instances loaded from db
        'data' => $userExp->findAll('idusers=:idusers', array(':idusers'=>Yii::app()->user->id)),
));
?>