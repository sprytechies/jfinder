<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Spry - Bluefields</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/styles.css" />
<!--advanced search script-->
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    
<script>
        $(document).ready(function() {
            $('a.search_btn').click(function() {
				$('#search-form').slideToggle(300);
				//alert();
				$('#inputsearch').slideToggle(300);
                $(this).toggleClass('closeexpand');
            });
        }); // end ready
    </script>
<!--advanced search script-->
<!--popup add more script start-->
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    
<script>
        var counter = 0;
$(function () {
    $('a.addmore_btn').click(function () {
        counter += 1;
		var id = $(this).attr('id');
    		var i = id.split("_");
        if(i[2]==1){
					
				$('#custom'+i[2]).append('<div><input id="companyName'+counter+'" class="form-control" type="text" placeholder="Company Name" /><input id="position'+counter+'" class="form-control" type="text" placeholder="Position" /><select id="timeFrom'+counter+'" class="form-control"><option>Time From</option><option>0 &ndash; 1</option><option>1 &ndash; 2</option></select><select id="timeTo'+counter+'" class="form-control"><option>Time To</option><option>0 &ndash; 1</option><option>1 &ndash; 2</option></select><textarea id="description'+counter+'" class="form-control" rows="2" placeholder="Description"></textarea></div><a class="remove" href="#">Remove</a>');
				}
				else if(i[2]==2){
					
					$('#custom'+i[2]).append('<div><div><input id="InsitituteName'+counter+'" class="form-control" type="text" placeholder="Insititute" /><input id="Degree'+counter+'" class="form-control" type="text" placeholder="Degree" /><input id="Field of Study'+counter+'" class="form-control" type="text" placeholder="Field of Study" /><select id="edutimeFrom'+counter+'" class="form-control"><option>Time From</option><option>0 &ndash; 1</option><option>1 &ndash; 2</option></select><select id="edutimeTo'+counter+'" class="form-control"><option>Time To</option><option>0 &ndash; 1</option><option>1 &ndash; 2</option></select><textarea id="edudescription'+counter+'" class="form-control" rows="2" placeholder="Description"></textarea></div><a class="remove" href="#">Remove</a>');
				
					}
			
    });
});
$(document).on('click', '.remove', function(){
    var $this = $(this);
    $this.add($this.prev()).add($this.next()).remove();
})
    </script>
<!--popup add more script end-->
<!--reply script start-->
    <script>
        $(document).ready(function() {
            $('ol.job-items li').click(function() {
    		var id = $(this).attr('id');
    		var i = id.split("_");
			if($(this).hasClass('open')){
					$('.inline-reply').hide();
					$('#'+id+' ol li.previous-reply').hide();
					
					$('li#'+id+'.open a.expand_btn').removeClass('collapse_btn');
					$(this).removeClass('expand-before open').next('li').removeClass('expand-after');
				}else{
						$('li#reply_'+i[1]).addClass('expand-before open').next('li').addClass('expand-after');
						$('li.open > ol.expanded-conversation li').css('display','block');
						$('li.open > .inline-reply').css('display','block');
						$('li#'+id+'.open a.expand_btn').toggleClass('collapse_btn');
			}
    		
			});
    	    }); // end ready
    </script>
    <!--reply script end-->
    <style type="text/css">
ol.job-items >li.open:first-child {
	margin-top:0px;
	margin-bottom:15px; border-top:none;
}
ol.job-items >li.open:last-child {
	margin-top:15px;
	margin-bottom:0px;
}
ol.job-items >li.open {
	margin-top:15px;
	margin-bottom:15px;
}
ol.job-items >li.expand-after {
	border-top:solid 1px #e9e9e9;
	border-radius:4px 4px 0px 0px;
}
ol.expanded-conversation >li {
	display:none;
}
ol.job-items >.js-job-items > ol.expanded-conversation > li.original-previous-items {
	display:block;
}
.inline-reply {
	display:none;
}
ol.job-items >li.open {
	border-top:solid 1px #e9e9e9;}
</style>
</head>
<body data-twttr-rendered="true">
<!--top_header start-->
<div class="navbar-wrapper">
  <div class="navbar navbar-default navbar-fixed-top header" role="navigation">
    <div class="container">
      <div class="navbar-header topheader">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand logo" href="#">jFinder</a> </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
	    <?php if(Yii::app()->user->isGuest){ ?>
            <li class="dropdown1"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
            <ul class="dropdown-menu">
	        <li> <a href="<?php echo Yii::app()->createUrl('user/login');?>">User Login</a></li>
                <li> <a href="<?php echo Yii::app()->createUrl('company/login');?>">Company Login</a></li>
            
	    </ul>
	    </li>
	    <li class="dropdown2"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign Up<b class="caret"></b></a>
		<ul class="dropdown-menu">
		    <li> <a href="<?php echo Yii::app()->createUrl('user/users/registration');?>">User Registration</a></li>
		    <li> <a href="<?php echo Yii::app()->createUrl('company/companies/registration');?>">Company Registration</a></li>
		</ul>
	    </li>
	    <?php }else{?>
	    
	    
	    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::app()->user->name;?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo Yii::app()->createUrl('company/dashboard');?>">Dashboard</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('company/dashboard/logout');?>">Logout</a></li>
            </ul>
          </li>
		<?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--top_header end-->
<!--search section start-->
<div id="companypage-header">
  <div class="team-header">
      
    <?php if((Yii::app()->controller->action->id!="registration")  && (Yii::app()->controller->id!="login")){
        ?>
            <div class="container">
                <div class="col-lg-7 search_sec width7">
                  <form class="form-horizontal" role="form">
                    <div class="display-t search_form">
                      <div class="display-tc width10">
                        <div id="inputsearch"> <a href="javascript:void(0)"> <span class="glyphicon glyphicon-search icon-search"></span></a>
                          <div class="form-group">
                            <input type="text" class="form-control" id="" placeholder="Search">
                          </div>
                        </div>
                        <div id="search-form">
                          <div class="form-group">
                            <input type="text" class="form-control" id="" placeholder="Location">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="" placeholder="Category">
                          </div>
                          <div class="form-group">
                            <select class="form-control">
                              <option>Salary - minimum</option>
                              <option>0 &ndash; 1 Lakh</option>
                              <option>1 &ndash; 2 Lakh</option>
                            </select>
                            <select class="form-control">
                              <option>Salary - maximum</option>
                              <option>0 &ndash; 1 Lakh</option>
                              <option>1 &ndash; 2 Lakh</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-default pull-right">Advanced Search</button>
                        </div>
                      </div>
                      <div class="display-tc adsearch"> <a href="javascript:void(0)" class="search_btn">Advanced Search</a> </div>
                    </div>
                  </form>
                </div>
              </div>
            
            <?php
    }?>
  </div>
</div>

     <div class="container"> 
      <!--middle content start-->
      <div class="row m-bottom">
    <div id="companypage_body">
        <?php echo $content;?>
        </div>
      </div>
     </div>
<!--middle content end--> 
  <!--footer start-->
  <div class="m-bottom">
    <div class="footer text-center">
          <p>&copy; 2013 Bluefields Inc.  All rights reserved. - Download our <a href="javascript:void(0)">iPhone</a> or <a href="javascript:void(0)">Android app</a></p>
        </div>
  </div>
  <!--footer end--> 
</div>
     
<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap/bootstrap.min.js"></script>
<script>
$('#addmore_exp').click(function(){
  $('#exp-append').append("<div>"+$('#exp').html()+"</div>");
  $('#exp-append').append("<a class=\"remove\" href=\"javascript:void(0)\">Remove</a>");
});
$('#addmore_edu').click(function(){
  $('#edu-append').append("<div>"+$('#edu').html()+"</div>");
  $('#edu-append').append("<a class=\"remove\" href=\"javascript:void(0)\">Remove</a>");
});
$(document).on('click', '.remove', function(){
    var $this = $(this);
    $this.add($this.prev()).remove();
    $this.remove();
})
</script>
<?php 
if(Yii::app()->user->hasFlash('message')){?>
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Message</h4>
      </div>
      <div class="modal-body">
        <?php echo Yii::app()->user->getFlash('message')?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<script>
$("#message").modal();
</script>

<?php }?>
</body>
</html>

