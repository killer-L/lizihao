 <?php
	session_start ();
	if (! isset ( $_SESSION ['tester'] )) {
		header ( "location:login.php" );
	}
	// 获取用户名
	$userName = $_SESSION ['tester'] ['userName'];
	$userName = $_SESSION ['tester'] ['userName'];
	$studentid = $_SESSION ['tester'] ['studentId'];
	
	require_once '../dbconfig.php';
	// 查询试卷表,如果该生有成绩，就查询出来
	$query = "select paper.id,name,paper.subject,total,content,mark from paper left outer join score on score.paper_id = paper.id and score.studentId ='$studentid'";
	$result = @mysql_query ( $query );
	while ( $testRow = @mysql_fetch_array ( $result ) ) {
		$papers [] = $testRow;
	}
	?>
<?php require_once 'base.php';?>
		<!-- /. NAV SIDE  -->
			<div class="wrapper">
		
		<div id="board-wrapper">
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
						<h2>我的考试</h2>
					</div>
				</div>
				<!-- /. ROW  -->
				<hr />
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading"></div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example">
										<thead>
											<tr>
												<th>序号</th>
												<th>考试编号</th>
												<th>考试名称</th>
												<th>科目</th>
												<th>成绩</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
									<?php
									$lineno = 0;
									foreach ( $papers as $row ) {
										$lineno ++;
										$linestyle = $lineno % 2 == 1 ? "odd gradeX" : "even gradeC";
										echo "<tr class='" . $linestyle . "'>";
										echo "<td>" . $lineno . "</td>";
										echo "<td>" . $row ['id'] . "</td>";
										echo "<td>" . $row ['name'] . "</td>";
										echo "<td>" . $row ['subject'] . "</td>";
										echo "<td>" . ($row ['mark'] == '' ? '<font color=red><b>待考</b></font>' : $row ['mark']) . "</td>";
										$url = "edit.php?id=" . $row ['id'];
										$testurl = "test.php?test_paper_id=" . $row ['id'];
										if ($row ['mark'] == '') {
											echo "<td>&nbsp;<a class='btn btn-danger btn-sm shiny' href='" . $testurl . "'><i class='fa fa-edit'>&nbsp;现在考试</i></a></td>";
										} else {
											echo "<td></td>";
										}
										echo "</tr>";
									}
									?>
								</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</div>
	</div>
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="../assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="../assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="../assets/js/jquery.metisMenu.js"></script>
	<!-- DATA TABLE SCRIPTS -->
	<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables-example').dataTable();
	});
</script>
	<!-- CUSTOM SCRIPTS -->
	<script src="../assets/js/custom.js"></script>
</body>
</html>