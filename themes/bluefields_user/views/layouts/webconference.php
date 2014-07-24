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
<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery-1.9.1.min.js"></script>


</head>
<body data-twttr-rendered="true" onload="ShowCurrentTime()">
<!--top_header start-->
<div class="navbar-wrapper">
  <div class="navbar navbar-default navbar-fixed-top header" role="navigation">
    <div class="container">
      <div class="navbar-header topheader">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand logo" href="#">jFinder</a> </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Nav header</li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--top_header end--> 
<!--top-chat-section-->
<div class="top-chat-section">
	<div class="container">
    	<div class="chat-screen-header">
        	<a class="jflogo" href="javascript:void(0)">jFinder</a>
            <div class="timer">
            <label>
            <script type="text/javascript">
<!--
var currentTime = new Date()
var month = currentTime.getMonth() + 1
var day = currentTime.getDate()
var year = currentTime.getFullYear()
document.write(day + "/" + month + "/" + year)
//-->
</script>

<script type="text/javascript">
function ShowCurrentTime() {
var dt = new Date();

document.getElementById("lblTime").innerHTML = dt.toLocaleTimeString();
window.setTimeout("ShowCurrentTime()", 1000); // Here 1000(milliseconds) means one 1 Sec  
}
</script>
<label id="lblTime"></label>
            	<span class="glyphicon glyphicon-time"></span>
                </label>
            </div>
            <div class="jobname">
            	<h4>My Job</h4>
            </div>
        </div>
    </div>
</div>
<?php echo $content?>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap/bootstrap.min.js"></script>
<!--timer js-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/timer/jquery.timer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/timer/timer.js"></script>
<!--timer js end-->
<script src='<?php echo Yii::app()->theme->baseUrl ?>/js/init.js'></script>

<script src='http://localhost:8000/socket.io/socket.io.js'></script>
<script src='<?php echo Yii::app()->theme->baseUrl ?>/js/lib/adapter.js'></script>

<script src='<?php echo Yii::app()->theme->baseUrl ?>/js/main.js'></script>
</body>
</html>
