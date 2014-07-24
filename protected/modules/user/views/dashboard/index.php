<script>
        function allFine(data) {
                // display data returned from action
                //alert('hi');
                $("#job-items").append(data);        
         }
         function allFine_applied(data) {
             //alert('hi');
                // display data returned from action
                $("#job-items_applied").append(data);        
         }
         function allFine_saved(data) {
            // alert('hi');
                // display data returned from action
                $("#job-items_saved").append(data);        
         }

        function save_reply(id)
        {
         text_id=$('#hidden_apply_'+id).val();// getting the jobapplied id
         var message=$("#message_"+id).val(); //getting message
//          alert(id); //jobid 
//          alert(text_id); //jobapplied id  
//          alert(message);
        var a=$.ajax({ 
                type: "POST",
                url: "index.php?r=user/dashboard/savereply",
                 async: true,
                data: {  message:message,apply_id:text_id},
              
                }).done(function(response){
                    
                    $('#previous-reply_'+id).prepend(response);
                });    
        }
        
        function apply_job(id)
        {
           var id=$("#id_job_"+id).val() ;
            //alert(id);
            $.ajax({ 
                type: "POST",
                url: "index.php?r=user/dashboard/apply_job",
                data: { idjob: id},
               }).done(function(response){
                if( response == parseInt(response)){
                    text_id=$('#hidden_apply_'+id).val(response);
                    alert("successfully applied..");
                     $('#apply_button_'+id).css('color','#2ABD7A');
                   $('#apply_button_'+id+' span.glyphicon').css('color','#2ABD7A');}
                else{
                 alert(response);
                   
                }
                });    
        }
        
        function save_process(id)
        {
          var savedid=$('#saved_jobid'+id).val();
          if(savedid == 0){
          //$('#mySavedJobs'+id).modal();
             $.ajax({ 
                    type: "POST",
                    url: "index.php?r=user/dashboard/save_note_popup",
                    data: {jobid:id},
                    }).done(function(response){
                       $('#mySavedJobs').html(response); 
                       $('#mySavedJobs').modal();
                   });
            }
            else{
            var r=confirm("Do you really wants to unsave this job");
                if (r==true)
                {
                    $.ajax({ 
                    type: "POST",
                    url: "index.php?r=user/dashboard/delete_saved",
                    data: {savedid: savedid},
                    }).done(function(response){
                        alert(response);
                       $('#saved_jobid'+id).val(0);
                       $('#save_button_'+id).toggleClass('save-apply');
                       $('#save_button_'+id+' span.glyphicon').css('color','#BBBBBB');

                        });
                }
              }
        }
        
        function save_job_note(id){
            var note=$("#save_note"+id).val() ;
            //alert(id);
            $.ajax({ 
                type: "POST",
                url: "index.php?r=user/dashboard/save_job",
                data: { jobid: id,note:note},
               }).done(function(response){
                if( response == parseInt(response)){
                    //text_id=$('#hidden_apply_'+id).val(response);
                    //alert("successfully saved..");
                   $('#saved_jobid'+id).val(response);
                   $('#save_button_'+id).toggleClass('save-apply');
                      //$('#save_button_'+id).onclick=
                   $('#save_button_'+id+' span.glyphicon').css('color','#2ABD7A');
               }
                else{
                 alert(response);
                 }
                });
        }
        

                </script>
<script type="text/javascript">
	$(document).ready(function() {
            $('#reply-fn').click(function() {
            $('span.glyphicon-retweet').css('color', '#2ABD7A');
            });
        });
</script>
<!--expand script start-->
<script>
function expand_data(src,id){
   
        $(src).toggleClass("collapse-btn");
       /* $('#expand_button_'+id).toggleClass("collapse-btn");*/
        $("#reply_"+id+" .reply-action").toggleClass("reply-expand");
                
  } 
  $(document).ready(function(){
  $("a.report").click(function(){
	  var id = $(this).parent().parent().parent().parent().parent().attr('id');
	$("#"+id+" .report").toggleClass("save-report");
  });
});
</script>
<!--expand script end-->

<div class="col-lg-7 width7 right_part">
        <div class="bs-example bs-example-tabs m-top1">
          <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#Jobs" data-toggle="tab"><span class="glyphicon glyphicon-globe"></span>Jobs</a></li>
            <li><a href="#Jobs_Applied" data-toggle="tab"><span class="glyphicon glyphicon-briefcase"></span>Jobs Applied</a></li>
            <li><a href="#Saved_Jobs" data-toggle="tab"><span class="glyphicon glyphicon-saved"></span>Saved Jobs</a></li>
            <li><a href="#Scheduled" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span>Scheduled</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active graybg" id="Jobs">
              <ul class="nav navbar-nav pull-right">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort by<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">High Package</a></li>
                    <li><a href="#">Package by Experience</a></li>
                    <li><a href="#">Fresher</a></li>
                    </ul>
                </li>
                </ul>
                <div class="section">
                <div class="content_header">
                  <div class="header-inner"> </div>
                </div>
                <div class="conversation">
                  <div class="job_line">
                      <?php if(isset($data[0]['idjobs'])){ ?>
                      <ol class="job-items" id="job-items">
                      <?php 
                      $i=1; foreach ($data as $value) {
                    ?><?php $res=getAppliedId($value['idjobs']);
                            $res_saved=getSavedId($value['idjobs']);?>
                       <li class="js-job-items"<?php echo "id=reply_$i"; ?>>
                        <div class="job-profile">
                          <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/img70x70.jpg" alt="" /> </div>
                          <div class="col-lg-11 width11 content">
                            <h4><?php echo $value['name']; ?></h4>
                            <span class="date">29 Nov.</span>
                            <div class="jumbotron content_bg">
                              <div class="post">
                                <h4><?php echo $value['title']; ?></h4>
                                <p><?php echo $value['description']; ?></p>
                                <div class="collapse-data">
                                  <p>This is the content of my entry.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                                     qui officia deserunt mollit anim id est laborum.</p>
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
                         <?php $i++; Yii::app()->session['range']=$value['idjobs']; } ?>
                     </ol>
                      <?php } else { echo "<ol class='job-items'><li class='js-job-items'><div class='noresult'>No results found</div></li></ol>";}?>
                    <?php $url=  CHtml::normalizeUrl('dashboard/more_res'); echo CHtml::ajaxLink('+ Add more','index.php?r=user/dashboard/more_res',array('success' =>'allFine'),array("class"=>"link-addMore","name"=>"addMore_applied"));?>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="Jobs_Applied" >
                <ul class="nav navbar-nav pull-right">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort by<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">High Package</a></li>
                    <li><a href="#">Package by Experience</a></li>
                    </ul>
                </li>
                </ul>
                <div class="section">
                <div class="content_header">
                  <div class="header-inner"> </div>
                </div>
                <div class="conversation">
                  <div class="job_line">
                      <?php if(isset($data_applied[0]['idjobs'])){ //to check there is some item in the result ?>
                      <ol class="job-items" id="job-items_applied">
                      <?php //print_r($data_applied);
                      //echo $data_applied[0]['idjobs'];
                      $i=1; foreach ($data_applied as $value) {
                    ?>
                          <?php $res=getAppliedId($value['idjobs']);
                            $res_saved=getSavedId($value['idjobs']);?>
                    
                        <li class="js-job-items"<?php echo "id=reply_$i"; ?>>
                        <div class="job-profile">
                          <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrl?>/images/img70x70.jpg" alt="" /> </div>
                          <div class="col-lg-11 width11 content">
                            <h4><?php echo $value['name']; ?></h4>
                            <span class="date">29 Nov.</span>
                            <div class="jumbotron content_bg">
                              <div class="post">
                                  
                                <h4><?php 
                                
                                echo $value['title']; ?></h4>
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
                                  <?php /*
                                  $jobinv = JobInvites::model()->findByAttributes(array('idjobsapplied'=>$res,'status'=>2));
                                  if(isset($jobinv) || $jobinv){ 
                                    // echo "<li><a href='http://localhost:2013/?idjobsapplied=".$jobinv->idjobsapplied."&title=".$jobinv->title."' target='_tab'><span class='notification'></span>Start Interview</a></li>";
                                   echo "<li><a href='".Yii::app()->createUrl("webconference/start",array('idjobsapplied'=>$jobinv->idjobsapplied,'title'=>$jobinv->title))."' target='_tab'><span class='notification'></span>Start Interview</a></li>";
                                   
                                  }*/
                                  ?>
                                  
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
                         <?php $i++; Yii::app()->session['range_applied']=$value['idjobs']; } ?>
                     </ol>
                      <?php } else { echo "<ol class='job-items'><li class='js-job-items'><div class='noresult'>No results found</div></li></ol>";}?>
                    <?php $url=  CHtml::normalizeUrl('dashboard/more_res'); echo CHtml::ajaxLink('+ Add more','index.php?r=user/dashboard/more_applied',array('success' =>'allFine_applied'),array("class"=>"link-addMore"));?>
                  </div>
                </div>
              </div>
                         
            </div>
            <div class="tab-pane fade" id="Saved_Jobs">
                <ul class="nav navbar-nav pull-right">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort by<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">High Package</a></li>
                    <li><a href="#">Package by Experience</a></li>
                    </ul>
                </li>
                </ul>
                <div class="section">
                <div class="content_header">
                  <div class="header-inner"> </div>
                </div>
                <div class="conversation">
                  <div class="job_line">
                      <?php if(isset($data_savedjob[0]['idjobs'])){ ?>
                      <ol class="job-items" id="job-items_saved">
                      <?php 
                      $i=1; foreach ($data_savedjob as $value) {
                    ?>
                          <?php $res=getAppliedId($value['idjobs']);
                          $res_saved=getSavedId($value['idjobs']);?>
                    
                        <li class="js-job-items"<?php echo "id=reply_$i"; ?>>
                        <div class="job-profile">
                          <div class="photos display-tc"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/img70x70.jpg" alt="" /> </div>
                          <div class="col-lg-11 width11 content">
                            <h4><?php echo $value['name']; ?></h4>
                            <span class="date">29 Nov.</span>
                            <div class="jumbotron content_bg">
                              <div class="post">
                                <h4><?php echo $value['title']; ?></h4>
                                <p><?php echo $value['description']; ?></p>
                                <div class="collapse-data">
                                  <p>This is the content of my entry.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                                    et dolore magna aliqua. Ut  cupidatat.</p>
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
                     </ol>
                      <?php } else { echo "<ol class='job-items'><li class='js-job-items'><div class='noresult'>No results found</div></li></ol>";}?>
                    <?php $url=  CHtml::normalizeUrl('dashboard/more_saved'); echo CHtml::ajaxLink('+ Add more','index.php?r=user/dashboard/more_saved',array('success' =>'allFine_saved'),array("class"=>"link-addMore","name"=>"addMore"));?>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="tab-pane fade" id="Scheduled">
              <p> coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park. assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
              <p>single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park. assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
            </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="mySavedJobs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    </div>