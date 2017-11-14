<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ThemeBucket">
<link rel="shortcut icon" href="#" type="image/png">

<title>成绩管理</title>

<!--data table-->
<link rel="stylesheet" href="../js/data-tables/DT_bootstrap.css" />

<link href="../css/style.css" rel="stylesheet">
<link href="../css/style-responsive.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">
<?php require_once 'base.php';?>
<?php
// 访问数据库，查询学生表
require_once '../dbconfig.php';
$sql = "select * from score";
$result = mysql_query ( $sql );
?>
        <!-- page heading start-->
	<div class="page-heading">
		<h3>成绩管理</h3>

	</div>
	<!-- page heading end-->

	<!--body wrapper start-->
	<div class="wrapper">
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading">
						成绩表 <span class="tools pull-right"> <a href="javascript:;"
							class="fa fa-chevron-down"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="adv-table editable-table ">
							
							<div class="space15"></div>
							<table class="table table-striped table-hover table-bordered"
								id="editable-sample">
								<thead>
									<tr>
										<th>学号</th>
										<th>练习名</th>
										<th>科目</th>
										<th>成绩</th>
										<th>删除</th>
									</tr>
								</thead>
								<tbody>
                        		<?php
                        $line = 0;
                        while ($row = mysql_fetch_array($result)) {
                            $line ++;
                            $linecolor = $line % 2 == 0 ? 'odd gradeX' : 'even gradeC';
                            echo "<tr class='$linecolor'>";
                            echo "<td>" . $row['studentId'] . "</td>";
                            echo "<td>" . $row['test_name'] . "</td>";
                            echo "<td>" . $row['subject'] . "</td>";
                            echo "<td>" . $row['mark'] . "</td>";
									echo "<td>" ."<a href=\"deletescore.php?id='" . $row['id'] . "'\">删除</i></a></td>";
                                                        echo "</tr>";
                        }
                        ?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!--body wrapper end-->




	</div>
	<!-- main content end-->
	</section>

	<!-- Placed js at the end of the document so the pages load faster -->
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="../js/jquery-migrate-1.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/modernizr.min.js"></script>
	<script src="../js/jquery.nicescroll.js"></script>

	<!--data table-->
	<script type="text/javascript"
		src="../js/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../js/data-tables/DT_bootstrap.js"></script>

	<!--common scripts for all pages-->
	<script src="../js/scripts.js"></script>

	<!--script for editable table-->
	<script src="../js/editable-table.js"></script>

	<!-- END JAVASCRIPTS -->
	<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>

</body>
</html>
