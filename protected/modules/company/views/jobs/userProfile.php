<div class="modal-dialog user-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="groupMemberLabel"><?php echo $profile->name?>'s Profile</h4>
        </div>
	
        <div class="modal-body">
            <div class="singup-body m-top2"> 
                <div class="display-t full-width">
                <div class="display-tc coloumn-third align-top">
                    <div class="register_photos m-bottom">
                        <img src="<?php echo Yii::app()->theme->baseUrl?>/images/user-photo.jpg" alt="">
                    </div>
                    <div class="file_upload">
                        <input id="file_upload" type="file" name="file_upload">
                    </div>
                </div>
                    <div class="display-tc userdetails" style="text-align: right;">
                        <h5><div class="form-group">
                            <?php echo $profile->name?>
                        </div>
                        <div class="form-group">
                            <?php echo $profile->email?>
                        </div>
                        <div class="form-group">
                            <?php echo $profile->phone?>
                        </div>
                        <div class="form-group">
                            <?php echo $profile->address?>
                        </div>
                        <div class="form-group">
                            <?php echo $profile->city?>
                            <?php echo $profile->pin?>
                        </div>
                        <div class="form-group">
                            <?php echo $profile->state?>
                        </div>
                        <div class="form-group">
                            <?php echo $profile->country?>
                        </div></h5>
                        </div>
                </div>
                <p class="border"></p>
                <p>
                    <span class="glyphicon glyphicon-credit-card"></span>
                    <span>
                    <strong>Professional Background</strong>
                    </span>
                </p>
                <div class="past_info">
                    <div id="exp">
                        <?php
                            $this->widget('bootstrap.widgets.TbGridView',array(
                            'id'=>'exp-grid',
                            'dataProvider'=>$experience,
                            'type'=>'striped bordered condensed hover ',
                            'columns'=>array(
                                'company',
                                'name',
                                'location',
                                'description',
                                'from',
                                'to'
                                ))
                            );
                    ?>
                    </div>
                    <p class="m-top2">
                    <span class="glyphicon glyphicon-book"></span>
                    <span>
                    <strong>Your Education</strong>
                    </span>
                    </p>
                    <div id="edu">
                          <?php
                            $this->widget('bootstrap.widgets.TbGridView',array(
                            'id'=>'edu-grid',
                            'dataProvider'=>$education,
                            'type'=>'striped bordered condensed hover ',
                            'columns'=>array(
                                'name',
                                'degree',
                                'description',
                                'completed',
                                ))
                            );
                    ?>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
		

