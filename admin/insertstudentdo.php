<?php
require_once '../dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 取表单数据
$studentId = $_POST ['studentId'];
$name = $_POST ['name'];
$className = $_POST ['className'];
$birthday = $_POST ['birthday'];
$sex = $_POST ['sex'];
$nation = $_POST ['nation'];


// sql语句中字符串数据类型都要加引号，数字字段随便
//$sql = "insert into student(studentId,name,className,birthday,sex,nation) values('$studentId','$name','$className','$birthday','$sex','$nation')";
$sql = "insert student set studentId ='$studentId',name = '$name',className = '$className',birthday = '$birthday',sex ='$sex',nation='$nation' ";
if (mysql_query ( $sql )) {
	echo "添加成功！！！<br/>";
	echo "<a href='index.php'>回到主页</a>";
} else {
	echo "添加失败！！！<br/>";
	echo "<a href='index.php'>系统错误</a>";
}