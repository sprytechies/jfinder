<?php $i=Yii::app()->session['range_saved']+1;
                   foreach ($data_saved as $value) {
                    ?><?php $res=getAppliedId($value['idjobs']);
                     $res_saved=getSavedId($value['idjobs']);?>
                    <li class="js-job-items"<?php echo "id=reply_$i"; ?>>
                        <div class="job-profile">
                          <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrl?>/images/img70x70.jpg" alt="" /> </div>
                          <div class="col-lg-11 width11 content">
                           <h4><?php echo $value['name']; ?></h4>
                            <span class="date">29 Nov.</span>
                            <div class="jumbotron content_bg">
                              <div class="post">
                                <h4><?php echo $value['title']; ?></h4>
                                <p><?php echo $value['description']; ?></p>
                                <div class="collapse-data">
                                  <p>This is the content of my entry.</p>
                                  <p>Lorem ipsum dolor siipisicing elit,  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        	<div class="comment-section">
                            	<div class="comment-links">
                                <ul class="nav nav-pills tweetlinks">
                                  <li><a href="javascript:void(0)" class="expand" id="expand_button" onclick="expand_data(this,<?php echo $i; ?>)" ><span class="notification"></span>Expand</a><input type="hidden" id="id_job_<?php echo $value['idjobs']; ?>" value="<?php echo $value['idjobs']; ?>"></li>
                                  <li><a href="javascript:void(0)" <?php if(isset($res)){echo "class=save-apply";}else{echo "class=apply"; } ?> onclick="apply_job(<?php echo $value['idjobs']; ?>)" id="apply_button_<?php echo $value['idjobs']; ?>"><span class="glyphicon glyphicon-ok"></span>Apply</a></li>
                                  <input type="hidden" id="saved_jobid<?php echo $value['idjobs']; ?>" value="<?php if(isset($res_saved)){echo $res_saved;}else{echo $res_saved;}?>">
                                    <li><a href="javascript:void(0)" 
                                      <?php
                                      if(isset($res_saved)){
                                      echo "class='save-apply'"; 
                                      }
                                      else{
                                          echo "class='apply'"; 
                                        } ?> id="save_button_<?php echo $value['idjobs']; ?>" role="button" data-toggle="modal" onclick="save_process(<?php echo $value['idjobs'];?>)"><span class="glyphicon glyphicon-retweet"></span>Save</a></li>
<li><a href="javascript:void(0)" class="report"><span class="glyphicon glyphicon-star"></span>Report</a></li>
                                </ul>
                                </div>
                                <div class="reply-action">
                              <div class="inline-reply">
                              <span class="bubble"></span>
                                  <div class="display-t">
                                    <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/img40x40.png" alt="" /> </div>
                                    <div class="col-lg-11 width11 content"> <span class="date">29 Nov.</span>
                                      <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                          <textarea class="form-control" rows="2" id="<?php echo "message_".$value['idjobs'];;?>" placeholder="Replay to @userAdmin @jfinder.com"></textarea>
                                        </div>
                                        <a href="javascript:void(0)" class="upload-photo"> <span class="glyphicon glyphicon-cloud-upload"></span> Upload Photo</a>
                                        <div class="image-selector">
                                          <input class="file-data" type="hidden" value="">
                                          <input class="file-input" type="file" title="Add Photo">
                                        </div>
                                        
                                        <input type="hidden" id="hidden_apply_<?php echo $value['idjobs'];?>" value="<?php echo $res;?>">
                                        <button class="btn btn-light pull-right" type="button"  data-dismiss="modal" onclick="save_reply(<?php echo $value['idjobs'];?>)" >Reply</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                    <div class="previous-reply" id="<?php echo "previous-reply_".$value['idjobs'];?>">
                                    <?php
                                    if(isset($res)){
                                         $reply_data=getMessages($res);
                                    foreach($reply_data as $val){ ?>
                                  <div class="simple-items">
                                    <div class="display-t">
                                      <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrl?>/images/img40x40.png" alt="" /> </div>
                                      <div class="col-lg-11 width11 content"> <a href="javascript:void(0)" class="account-group"> <strong>Abhi</strong> <span class="light-color">@ <span>ImAbhijit</span></span> </a> <span class="date">29 Nov.</span>
                                          <p>userAdmin @jfinder.com <br/> <?php echo($val['message']); ?></p>
                                        <div class="comment-links">
                                <ul class="nav nav-pills tweetlinks">
                                  <li><a href="javascript:void(0)" class="expand">Expand</a></li>
                                </ul>
                                </div>
                                      </div>
                                    </div>
                                  </div>
                                        <?php }}?>
                                </div>
                              </div>
                            </div>
                        </li> 
                         <?php $i++; Yii::app()->session['range_saved']=$value['idjobs']; } ?>