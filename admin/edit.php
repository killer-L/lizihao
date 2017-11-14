<?php require_once 'base.php';?>
<?php

if (! isset($_SESSION)) {
    session_start();
}
if (! isset($_SESSION['userName'])) {
    header("location:login.php");
}
$userName = $_SESSION['userName'];

// 访问数据库，查询学生表指定学号的学生
require_once '../dbconfig.php';
if (! isset($_REQUEST['id'])) {
    header("location:index.php");
}
$id = $_REQUEST['id'];
$sql = "select * from student where id = $id";
// exit($sql);
$result = mysql_query($sql);
$row = mysql_fetch_array($result)?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="../js/laydate.js"></script>
<title>修改学生信息</title>
</head>
<body>
<div class="page-heading">
	<div id="page-wrapper">
		<div id="page-inner">
			<div class="row">
				<div class="col-md-12">
					<h2>修改学生信息</h2>
				</div>
			</div>
			<!-- /. ROW  -->
			<hr />
			<div class="row ">

				<div
					class="col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong> 修改信息 </strong>
						</div>
						<div class="panel-body">

							<form method="post" action="editdo.php">
								<hr />
								<div class="form-signin-heading text-center">


									<input type='hidden' name='id' value='<?=$row ['id']?>' /> <br />

									<div class="form-group input-group">
										<tr>
											<td align='center'><i class="fa fa-bookmark fa-1x"></i>&nbsp;&nbsp;&nbsp;学号：</td>
											<td><input type='text' name='studentId'
												value='<?=$row ['studentId']?>' /></td>
										</tr>
									</div>
									<div class="form-group input-group">
										<tr>
											<td align='center'><i class="fa fa-user fa-1x"></i>&nbsp;&nbsp;&nbsp;姓名：</td>
											<td><input type='text' name='name' value='<?=$row ['name']?>' /></td>
										</tr>
									</div>
									<div class="form-group input-group">

										<tr>
											<td align='center'><i class="fa fa-book fa-1x"></i>&nbsp;&nbsp;&nbsp;班级：</td>
											<td><input type='text' name='className'
												value='<?=$row ['className']?>' /></td>
										</tr>
									</div>
									<div class="form-group input-group">

										<tr>
											<td align='center'><i class="fa fa-calendar fa-1x"></i>&nbsp;&nbsp;&nbsp;生日：</td>
											<td><input type='text' name='birthday' id="birthday"
												value='<?=$row ['birthday']?>' /></td>
										</tr>
									</div>
									<div class="form-group input-group">

										<tr>
											<td align='center'><i class="fa fa-user fa-1x"></i>&nbsp;&nbsp;&nbsp;&nbsp;性别：</td>
											<td><input type='radio' name='sex' value='男'
												<?=$row ['sex']=='男'?'checked':''?>><i
												class=" fa fa-male fa-1x"></i>&nbsp;&nbsp;男 </input> <input
												type='radio' name='sex' value='女'
												<?=$row ['sex']=='女'?'checked':''?>><i
												class=" fa fa-female fa-1x"></i>&nbsp;&nbsp;女</input></td>
										</tr>
									</div>
									<div class="form-group input-group">

										<tr>
											<td align='center'><i class=" fa fa-smile-o fa-1x"></i>&nbsp;&nbsp;&nbsp;&nbsp;民族：</td>
											<td><input type='text' name='nation'
												value='<?=$row ['nation']?>' /></td>
										</tr>
									</div>
									<div class="form-group input-group">
										<input type="submit" name="Submit" value="提交修改"
											class="btn btn-primary ">

									</div>

								</div>




							</form>

						</div>

					</div>
				</div>
			</div>

			<!-- Placed js at the end of the document so the pages load faster -->

			<!-- Placed js at the end of the document so the pages load faster -->
			<script src="../js/jquery-1.10.2.min.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/modernizr.min.js"></script>

</body>
</html>
