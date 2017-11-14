
<?php
require_once '../dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 处理表单数据
if (isset ( $_REQUEST ['title'] )) {
	$answer [] = isset ( $_REQUEST ['answer1'] ) ? 1 : 0;
	$answer [] = isset ( $_REQUEST ['answer2'] ) ? 1 : 0;
	$answer [] = isset ( $_REQUEST ['answer3'] ) ? 1 : 0;
	$answer [] = isset ( $_REQUEST ['answer4'] ) ? 1 : 0;
	$totalItems = $answer [0] + $answer [1] + $answer [2] + $answer [3];

	// 没有选择项
	if ($totalItems == 0) {
		echo "<javascript>alert('必须选择标准答案');</javascript>";
	} else {
		if ($totalItems == 1) {
			$type = '单';
		} else {
			$type = '多';
		}
		// 插入题干
		$subject = $_REQUEST ['subject'];
		$title = $_REQUEST ['title'];
		$sql = "INSERT INTO select_question(subject,type,title,memo) VALUES ('$subject','$type','$title','')";
		$result = mysql_query ( $sql );
		if ($result) {
			// 取出主键
			$select_question_id = mysql_insert_id ();
			// 保存四个选项内容
			$items [] = $_REQUEST ['item1'];
			$items [] = $_REQUEST ['item2'];
			$items [] = $_REQUEST ['item3'];
			$items [] = $_REQUEST ['item4'];
			for($i = 0; $i < count ( $items ); $i ++) {
				$isanswer = $answer [$i];
				$content = $items [$i];
				$sql = "INSERT INTO select_item(select_question_id,isanswer,content,memo) VALUES ('$select_question_id','$isanswer','$content','')";
				mysql_query ( $sql );
			}
		}
	}
}
if (mysql_query ( $sql )) {
	echo "添加成功！！！<br/>";
	echo "<a href='select_question.php'>回到主页</a>";
} else {
	echo "添加失败！！！<br/>";
	echo "<a href='select_question.php'>系统错误</a>";
}
?>
