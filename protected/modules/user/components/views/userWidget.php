<div class="col-lg-5 width5 left_part">
    <div class="userpanel jumbotron">
        <div class="panelbg">
            <div class="top_panel"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/user.jpg" alt="" />
                <h3>Admin</h3>
                <!-- Button trigger modal --> 
                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="edit-user-profile"><span class="glyphicon glyphicon-cog"></span></a> 
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog user-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">Profile</h4>
                            </div>
                            <div class="modal-body modal-body-description">
                                <?php $form = $this->beginWidget('GxActiveForm', array(
                                        'id' => 'user-profile-form',
                                        'enableAjaxValidation' => false,
                                        'enableClientValidation'=>true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                            'validateOnChange' => true,
                                            'validateOnType' => true
                                        ),
                                        'htmlOptions'=>array('class'=>'form-horizontal form-update-profile'),
                                ));
                                ?>
                                    <div class="user-info">
                                        <?php echo $this->render('_profile',array('profile'=>$profile,'form'=>$form,'upload'=>$upload));?> 
                                    </div>
                                    <div class="more-user-info">
                                        <div class="user_update_info">
                                            <p><span class="glyphicon glyphicon-list"></span> <span><strong>Experience</strong></span></p>
                                            <?php echo $this->render('_experience',array('userExp'=>$userExp,'validatedMembersExp'=>$validatedMembersExp,'form'=>$form),false,true);?> 
                                        </div>
                                        <div class="user_update_info edu_update_info">
                                            <p><span class="glyphicon glyphicon-book"></span> <span><strong>Education</strong></span></p>
                                            <?php echo $this->render('_education',array('userEdu'=>$userEdu,'validatedMembersEdu'=>$validatedMembersEdu,'form'=>$form),false,true);?> 
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                      <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-primary'))?>
                            </div>

                              <?php $this->endWidget(); ?>
                        </div>
                          <!-- /.modal-content --> 
                    </div>
                <!-- /.modal-dialog --> 
                </div>
                  <!-- /.modal --> 
             </div>
        </div>
        <div class="top_panel">
            <p><span class="glyphicon glyphicon-user"></span> <span>I love cricket and music</span></p>
            <p><span class="glyphicon glyphicon-envelope"></span> <span>admin.user@sprytechies.com</span></p>
            <p><span class="glyphicon glyphicon-earphone"></span> <span>+ 9876543210</span></p>
        </div>
    </div>
    <div class="userpanel jumbotron">
        <div class="panelbg">
        <div class="top_panel">
              <p><span class="glyphicon glyphicon-link"></span> <span class="title">Links</span></p>
            </div>
        </div>
          <div class="link_panel">
        <ul class="nav nav-pills nav-stacked links">
              <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-search"></span>Previous searches</a></li>
              <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-leaf"></span>Useful Links</a></li>
              <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-user"></span>Complete Profile</a></li>
              <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
            </ul>
        </div>
    </div>
</div>