<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ThemeBucket">
<link rel="shortcut icon" href="#" type="image/png">

<title>试卷管理</title>

<!--data table-->
<link rel="stylesheet" href="../js/data-tables/DT_bootstrap.css" />

<link href="../css/style.css" rel="stylesheet">
<link href="../css/style-responsive.css" rel="stylesheet">


</head>

<body class="sticky-header">
<?php require_once 'base.php';?>
<?php
// 查询试卷表
require_once '../dbconfig.php';
$query = "select * from paper";
$queryresult = mysql_query($query);
while ($row = mysql_fetch_array($queryresult)){
	$result[] = $row;
}

?>
        <!-- page heading start-->
	<div class="page-heading">
		<h3>题库管理</h3>

	</div>
	<!-- page heading end-->

	<!--body wrapper start-->
	<div class="wrapper">
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading">
						题库信息 <span class="tools pull-right"> <a href="javascript:;"
							class="fa fa-chevron-down"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="adv-table editable-table ">
							<a class='btn btn-primary btn-sm shiny' href='insertpaper.php'><i
							class='fa fa-edit'>&nbsp;生成试卷</i></a>
							<div class="space15"></div>
							<table class="table table-striped table-hover table-bordered"
								id="editable-sample">
								<thead>
									<tr>
										<th>试卷名称</th>
										<th>科目</th>
										<th>总题量</th>
										<th>内容</th>
										<th>备注</th>
										<th>删除</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$lineno = 0;
									foreach ( $result as $row ) {
										$lineno ++;
										$linestyle = $lineno % 2 == 1 ? "odd gradeX" : "even gradeC";
										echo "<tr class='" . $linestyle . "'>";
										echo "<td>" . $row ['name'] . "</td>";
										echo "<td>" . $row ['subject'] . "</td>";
										echo "<td>" . $row ['total'] . "</td>";
										echo "<td>" . $row ['content'] . "</td>";
										echo "<td>" . $row ['memo'] . "</td>";
										$delurl = "paperdelete.php?id".$row ['id'];
										echo "<td>&nbsp;<a  href='" . $delurl . "'>&nbsp;删除</i></a></td>";
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
    $(document).ready(function() {
		$('#dataTables-example').dataTable();
	});
</script>

</body>
</html>
