<div class="col-lg-5 width5 left_part">
        <div class="userpanel jumbotron">
              <div class="panelbg">
		  <div class="top_panel"> <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user.jpg" alt="" />
                  <h3><?php echo $companies->name; ?></h3>
                  <!-- Button trigger modal --> 
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="edit-user-profile"><span class="glyphicon glyphicon-cog"></span></a> 
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog user-dialog">
                      <div class="modal-content">
			  <?php $form = $this->beginWidget('GxActiveForm', array(
				'id' => 'users-form',
                                'action' => Yii::app()->createUrl('company/dashboard'),  //<- your form action here
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
			  
                    <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Profile</h4>
                        </div>
			   <div class="form">
			  <div class="modal-body modal-body-description">
                          <form class="form-horizontal form-update-profile" role="form">
                        <div class="user-info">
                              <p><strong>Profile Picture</strong></p>
                              <div class="user_photos"> <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/user-photo.jpg" alt="" />             
                                  <p>
                                  <div class="image_upload">
                                    <input id="image_upload" type="file" name="file_upload">
                                  </div>
                              
                              </div>
                  
                             <div class="user_update_info m-top1">
                             <div class="form-group">
                                     <label for="inputName3" class="col-sm-3 control-label">Name:<i class="profile_required">*</i></label> 
                                <div class="col-sm-9">
                                <?php echo $form->textField($companies, 'name', array('maxlength' => 128, 'placeholder'=>"User name", 'class'=>"form-control")); ?>
				
				<?php echo $form->error($companies,'name'); ?>
                                </div>
                                </div>
			    <div class="form-group">
                                    <label for="inputUrl3" class="col-sm-3 control-label">Url:</label>
                                <div class="col-sm-9">
                                    <?php echo $form->textField($companies, 'url', array('maxlength' => 128, 'placeholder'=>"Company Url", 'class'=>"form-control")); ?>
                                    
                                    <?php echo $form->error($companies,'url'); ?>
                                </div>
				</div>
			    <div class="form-group">
                                <label for="inputCountry3" class="col-sm-3 control-label">Country:</label>
                                    <div class="col-sm-9">
                                    <?php echo $form->textField($companies, 'country', array('maxlength' => 128, 'placeholder'=>"Country", 'class'=>"form-control")); ?>
                                    
                                    <?php echo $form->error($companies,'country'); ?> 
                                    </div>
				</div>
			    <div class="form-group">
                                    <label for="inputDescription3" class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-9">
                                    <?php echo $form->textarea($companies, 'description', array('maxlength' => 128, 'placeholder'=>"I love cricket and music", 'class'=>"form-control")); ?>
                                     
                                    <?php echo $form->error($companies,'description'); ?>
                                    </div>
				</div>
			    <div class="form-group">
                                  <label for="inputState3" class="col-sm-3 control-label">State:<i class="profile_required">*</i></label>
                                    <div class="col-sm-9">
                                    <?php echo $form->textField($companies, 'state', array('maxlength' => 128, 'placeholder'=>"State", 'class'=>"form-control")); ?>
                                     
                                    <?php echo $form->error($companies,'state'); ?> 
                                    </div>
				</div>
			    <div class="form-group">
                                <label for="inputCity3" class="col-sm-3 control-label">City:</label>
                                    <div class="col-sm-9">
                                    <?php echo $form->textField($companies, 'city', array('maxlength' => 128, 'placeholder'=>"City", 'class'=>"form-control")); ?>
                                    
                                    <?php echo $form->error($companies,'city'); ?>
                                    </div>
				</div>
			    <div class="form-group">
                                   <label for="inputAddress3" class="col-sm-3 control-label">Address:<i class="profile_required">*</i></label>
                                    <div class="col-sm-9">
                                    <?php echo $form->textarea($companies, 'address', array('maxlength' => 128, 'placeholder'=>"Address", 'class'=>"form-control")); ?>
                                    
                                    <?php echo $form->error($companies,'address'); ?>
                                    </div>
                                </div>
			    <div class="form-group">
                                <label for="inputPin3" class="col-sm-3 control-label">Pin:<i class="profile_required">*</i></label>
                                    <div class="col-sm-9">
                                    <?php echo $form->textField($companies, 'pin', array('maxlength' => 58, 'placeholder'=>"Pin Number", 'class'=>"form-control")); ?>
                                     
                                    <?php echo $form->error($companies,'pin'); ?> 
                                    </div>
                                </div>	  
			    <div class="form-group">
                                <label for="inputPhone3" class="col-sm-3 control-label">Phone:</label>
                                 <div class="col-sm-9">
                                <span class="glyphicon glyphicon-earphone icon-input"></span>
				<?php echo $form->textField($companies, 'phone', array('maxlength' => 58, 'placeholder'=>"+9876543210", 'type'=>"number", 'class'=>"form-control inputtext")); ?>
				 
				<?php echo $form->error($companies,'phone'); ?>
                                 </div>
				</div>
			    <div class="form-group">
                                <label for="inputperson3" class="col-sm-3 control-label">Owner: </label>
                                    <div class="col-sm-9">
                                    <?php echo $form->textField($companies, 'person', array('maxlength' => 128, 'placeholder'=>"Owner Name", 'class'=>"form-control")); ?>
                                    
                                    <?php echo $form->error($companies,'person'); ?> 
                                    </div>
                                </div>
                          </div>
                            </div>
                        </div>
			        </div>
                    <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			<?php echo CHtml::submitButton('Save',array('class'=>'btn btn-default'));?>
		    </div>
			 
			  <?php
			  $this->endWidget();
			  ?>
                  </div>
                      <!-- /.modal-content --> 
                    </div>
                <!-- /.modal-dialog --> 
              </div>
                  <!-- /.modal --> 
                  
                </div>
          </div>
              <div class="top_panel">
            <p><span class="glyphicon glyphicon-align-justify"></span> <span><?php echo $companies->description; ?></span></p>
            <p><span class="glyphicon glyphicon-screenshot"></span> <span><?php echo "Address :<br/>&nbsp;&nbsp;&nbsp; ".$companies->address.", ".$companies->city.", ".$companies->state.", ".$companies->country; ?></span></p>
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
                  <li><a href="<?php echo Yii::app()->createUrl('company/jobs/post')?>">Job Post</a></li>
                  <li><a href="<?php echo Yii::app()->createUrl('company/jobs/list')?>">Job List</a></li>
                  <li><a href="javascript:void(0)">Others</a></li>
                </ul>
          </div>
            </div>
      </div>


