<div class="col-lg-7 width7 right_part">
        <div class="well done m-top1">
       <h4><?php echo $model->title ?></h4>
              <p class="border"></p>
              <div class="m-top2">
                  <table width="100%">
                      <tr>
                          <td width="50%"><strong> Title: </strong></td><td width="50%"><?php echo $model->title?></td>
                       </tr>
                       <tr>
                      <td><strong>Keyword : </strong></td><td><?php echo Jobs::model()->getKeywords($model->keywords); ?></td>
                       </tr>
                       <tr>
                      <td><strong>Description : </strong></td><td><?php echo $model->description?></td>
                       </tr>
                       <tr>
                      <td><strong>Location : </strong></td><td><?php echo $model->location?></td>
                       </tr>
                       <tr>
                      <td><strong>Date from : </strong></td><td><?php echo $model->datefrom?></td>
                       </tr>
                       <tr>
                      <td><strong>Date to : </strong></td><td><?php echo $model->dateto?></td>
                       </tr>
                       <tr>
                      <td><strong>Salary from : </strong></td><td><?php echo $model->amountfrom?></td>
                       </tr>
                       <tr>
                      <td><strong>Salary to : </strong></td><td><?php echo $model->amountto?></td>
                       </tr>
                       <tr>
                      <td><strong>Job type : </strong></td><td><?php if($model->type==0) { echo 'Full time';}else{ echo 'Part time';}?></td>
                       </tr>
                  </table>
            <div class="table-ad-list">
	    </div>
	  </div>
	</div>
</div>




