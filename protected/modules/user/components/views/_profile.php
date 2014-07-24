<p>
    <strong>Profile Picture</strong>
</p>
<div class="user_photos">
    <img alt="" src="<?php echo Yii::app()->theme->baseUrl?>/images/user-photo.jpg">
</div>
<?php //$this->widget( 'xupload.XUpload', array(
//    'url' => Yii::app( )->createUrl( "site/upload"),
//    'model' => $upload,
//    'htmlOptions' => array('id'=>'user-profile-form'),
//    'attribute' => 'image',
//    'multiple' => false,
////    'formView' => 'application.views.site.form1',
////    'uploadView' => 'application.views.site.upload1',
////    'downloadView' => 'application.views.site.download1',
////    'uploadTemplate' => 'template-upload1', // IMPORTANT!
////    'downloadTemplate' => 'template-download1',// IMPORTANT!
    //'options' => array(//Additional javascript options
//        //This is the submit callback that will gather
//        //the additional data  corresponding to the current file
////        'submit' => "js:function (e, data) {
////            var inputs = data.context.find(':input');
////            data.formData = inputs.serializeArray();
////            return true;
////        }"
//    //),
//    )    
//);
?>
<div class="user_update_info m-top1">

    <div class="form-group">
        <?php echo $form->textField($profile, 'name', array('maxlength' => 128,'class'=>'form-control','placeholder'=>'Name')); ?>
        <?php echo $form->error($profile,'name'); ?>
    </div><!-- row -->
    <div class="form-group">
        <span class="glyphicon glyphicon-envelope icon-input"></span>
        <?php echo $form->textField($profile, 'email', array('maxlength' => 128,'class'=>'form-control inputtext','placeholder'=>'Alternate Email')); ?>
        <?php echo $form->error($profile,'email'); ?>
    </div><!-- row -->
    <div class="form-group">
        <span class="glyphicon glyphicon-earphone   icon-input"></span>
        <?php echo $form->textField($profile, 'phone', array('maxlength' => 16,'class'=>'form-control inputtext','placeholder'=>'Phone')); ?>
        <?php echo $form->error($profile,'phone'); ?>
    </div><!-- row -->

    <div class="form-group">
        <?php echo $form->textField($profile, 'country', array('maxlength' => 45,'class'=>'form-control','placeholder'=>'Country')); ?>
        <?php echo $form->error($profile,'country'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textField($profile, 'state', array('maxlength' => 45,'class'=>'form-control','placeholder'=>'State')); ?>
        <?php echo $form->error($profile,'state'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textField($profile, 'city', array('maxlength' => 45,'class'=>'form-control','placeholder'=>'City')); ?>
        <?php echo $form->error($profile,'city'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textArea($profile, 'address', array('maxlength' => 1028,'class'=>'form-control','placeholder'=>'Address')); ?>
        <?php echo $form->error($profile,'address'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textField($profile, 'pin',array('class'=>'form-control','placeholder'=>'Pin')); ?>
        <?php echo $form->error($profile,'pin'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textField($profile, 'twitter', array('maxlength' => 128,'class'=>'form-control','placeholder'=>'Twitter')); ?>
        <?php echo $form->error($profile,'twitter'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textField($profile, 'websites', array('maxlength' => 128,'class'=>'form-control','placeholder'=>'Websites')); ?>
        <?php echo $form->error($profile,'websites'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textField($profile, 'heading', array('maxlength' => 1028,'class'=>'form-control','placeholder'=>'Heading')); ?>
        <?php echo $form->error($profile,'heading'); ?>
    </div><!-- row -->
    <div class="form-group">
        <?php echo $form->textArea($profile, 'keyskills', array('maxlength' => 1028,'class'=>'form-control','placeholder'=>'Keyskills')); ?>
        <?php echo $form->error($profile,'keyskills'); ?>
    </div><!-- row -->
    
    <div class="display-tc coloumn-third align-top">
        <div class="cv_upload">
            <input id="file_upload" type="file" name="file_upload">
        </div>
    </div>
</div>
            