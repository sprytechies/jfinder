                    <div class="modal-dialog user-dialog-saved">
                        <div class="modal-content">
                            <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel"><?php echo $value['name']; ?></h4>
                            </div>
                            <div class="modal-body modal-body-description">
                                <form id="save-job-form" class="form-horizontal form-update-profile" method="post" action="/jfinder/index.php?r=user/dashboard">
                                    <p><b>Description: </b><?php echo $value['description']; ?></p> 
                                    <input type="hidden" name='hidden-jobid' value="<?php echo $value['idjobs']; ?>">
                                    <textarea id="save_note<?php echo $value['idjobs']; ?>" class="form-control" name="text_note" placeholder="Enter your note here"></textarea> 
                                </form>
                            </div>
                          <!-- /.modal-content --> 
                           <div class="modal-footer">
                            <button class="btn btn-light" data-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-primary" data-dismiss="modal" type="button"onclick="save_job_note(<?php echo $value['idjobs']; ?>)">Save</button>
                            </div>
                          
                    </div><!-- /.modal-dialog --> 
                </div>
               