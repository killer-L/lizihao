
<?php require_once 'base.php';?>
<?php
// 访问数据库，查询学生表
require_once '../dbconfig.php';
$sql = "select * from student";
$result = mysql_query ( $sql );
?>
        <!-- page heading start-->
	<div class="page-heading">
		<h3>学生信息</h3>

	</div>
	<!-- page heading end-->

	<!--body wrapper start-->
	<div class="wrapper">
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading">
						学生信息表 <span class="tools pull-right"> <a href="javascript:;"
							class="fa fa-chevron-down"></a>
						</span>
					</header>
					<div class="panel-body">
					<div class="adv-table editable-table">
					<a class='btn btn-primary btn-sm shiny' href='insertstudent.php'><i class="fa fa-plus"  >增加学生信息</i></a></div>
					   
							<div class="space15"></div>
							<table class="table table-striped table-hover table-bordered"
								id="editable-sample">
								<thead>
									<tr>
										<th>学号</th>
										<th>姓名</th>
										<th>班级</th>
										<th>生日</th>
										<th>性别</th>
										<th>民族</th>
										<th>修改</th>
										<th>删除</th>
									</tr>
								</thead>
								<tbody>
								<?php
        $line = 0;
        while ($row = mysql_fetch_array($result)) {
            $line ++;
            $lineStyle = $line % 2 == 1 ? "odd gradeX" : "even gradeC";
            echo "<tr class='$lineStyle'>";
            echo "<td>" . $row['studentId'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['className'] . "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
            echo "<td>" . $row['sex'] . "</td>";
            echo "<td>" . $row['nation'] . "</td>";
            echo "<td>" . " <a href=\"edit.php?id='" . $row['id'] . "'\">编辑</td>";
            echo "<td>"." <a href=\"delete.php?id='" . $row['id'] . "'\">删除</td>";
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
