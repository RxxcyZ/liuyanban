<?php 
	define('SYY', 1);
	require 'config.php'; 
	require 'include/db.class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言板</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="header">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">留言板</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">留言板</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="#">最新留言</a></li>
		        <li><a href="#">旗下网站</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Login</a></li>
		        <li><a href="#">Registe</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">About Me</a></li>
		            <li><a href="#">About Site</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
	<div class="row col-sm-6 col-md-offset-3">
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">留言<small>|<?php echo VERSION; ?></small></h3>
		    </div>
		    <div class="panel-body">
				<form role="form" action="save.php" method="POST">
				    <div class="form-group">
				    	<label for="name">撰写留言：</label>
				    	<textarea class="form-control" rows="3" name="message" placeholder="请输入留言内容"></textarea>
				    </div>
				    <div class="row">
					    <div class="col-lg-4">
					        <input type="text" class="form-control" name="username" placeholder="昵称（必填）">
					    </div>
					    <div class="col-lg-4">
					        <input type="text" class="form-control" name="mail" placeholder="邮箱（必填）">
					    </div>
					    <div class="col-lg-4">
					        <input type="text" class="form-control" name="url" placeholder="网址">
					    </div>
						<div class="col-lg-2 row-margin-top">
					    	<button type="submit" class="btn btn-default">提交</button>
					    </div>
					</div>
				</form>
		    </div>
		</div>
	</div>
<?php
	$sql = "SELECT * FROM `messages`";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo "<div class='row col-sm-6 col-md-offset-3'>
					 <div class='panel panel-default'>
			    		 <div class='panel-body'>
			        		 <p class='pull-left'><a href='".$row['uurl']."' target='view_window'>".$row['uname']."</a><small>(".$row['uua'].",".$row['uip'].")</small></p>
			        		 <p class='pull-right'>".date('Y-m-d H:i:s', $row['utime'])."</p>
			        		 <p class='neir'>".$row['umsg']."</p>
			        		 <p class='pull-right text-info'>".$row['uid']."楼</p>
			    		 </div>
					 </div>
				  </div>";
	}
}
?>
<?php include 'footer.php'; ?>
</body>
</html>