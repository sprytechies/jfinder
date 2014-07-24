<li class="js-job-items">
                        <div class="job-profile">
                          <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/img70x70.jpg" alt="" /> </div>
                          <div class="col-lg-11 width11 content">
                            <h4><?php echo $value['name']; ?> </h4>
                            <span class="date">29 Nov.</span>
                            <div class="jumbotron content_bg">
                              <div class="post">
                                <h4><?php echo $value['title']; ?></h4>
                                <p><?php echo $value['description']; ?></p>
                                <div class="collapse">
                                  <p>This is the content of my entry.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                                    qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        </div>
                      </li>
                      <li class="js-job-items">
                        <ul  class="reply-uc">
                          <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-share-alt"></span>Reply</a>
                            <ul>
                            
                              <li>
                                   <div class="inline-reply">
                                       <span class="bubble"></span>
                                  <div class="display-t">
                                    <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrli ?>/images/img40x40.png" alt="" /> </div>
                                    <div class="col-lg-11 width11 content"> <span class="date">29 Nov.</span>
                                      <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="2" placeholder="Replay to @userAdmin @jfinder.com" id="<?php echo "job".$value['idjobs'];?>"></textarea>
                                        </div>
                                        <a href="javascript:void(0)"> <span class="glyphicon glyphicon-cloud-upload"></span> Upload Photo</a>
                                        <div class="image-selector">
                                          <input class="file-data" type="hidden" value="">
                                          <input class="file-input" type="file" title="Add Photo">
                                        </div>
                                        <button class="btn btn-light pull-right" type="button" data-dismiss="modal" id="<?php echo $value['idjobs'];?>" onclick="printid(this.id)">Reply</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                  
                                
                                   
                                  <div class="previous-reply">
                                      <?php foreach($replyData as $val) { ?>
                                  <div class="simple-items">
                                    <div class="display-t">
                                      <div class="photos display-tc"> <img src="images/img40x40.png" alt="" /> </div>
                                      <div class="col-lg-11 width11 content"> <a href="javascript:void(0)" class="account-group"> <strong>Abhi</strong> <span class="light-color">@ <span>ImAbhijit</span></span> </a> <span class="date">29 Nov.</span>
                                        <p><?php echo $val['message'];?></p>
                                        <ul class="nav nav-pills tweetlinks">
                                          <li><a href="javascript:void(0)" class="expand_btn">Expand</a></li>
                                          <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-share-alt"></span> Reply</a></li>
                                          <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-retweet"></span> Retweet</a></li>
                                          <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-star"></span> Favourite</a></li>
                                          <li><a href="javascript:void(0)">More...</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                      <?php } ?>
                                </div>

 
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>