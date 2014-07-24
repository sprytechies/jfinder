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
            'class'=>'form-control rss r-width',
            //it is important to add an empty item because of new records
            'items'=>array(''=>'Graduated In (years)',2007=>2007,2008=>2008,2009=>2009,2010=>2010,2011=>2011,),
        ),
        'ongoing'=>array(
            'type'=>'checkboxlist',
            'class'=>'form-control rss r-width',
            'items'=>array('0'=>'Currently studying here'),

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
            'fieldsetWrapper' => array('tag' => 'div', 'htmlOptions' => array('class' => 'form-group id_userEdu_copy')),
            'addItemText'=>'<span class="glyphicon glyphicon-plus"></span> Add More ',
            'removeText'=>'<span class="glyphicon glyphicon-remove"></span>',
            //array of member instances loaded from db
            'data' => $userEdu->findAll('idusers=:idusers', array(':idusers'=>Yii::app()->user->id)),
));
?>