<?php
require_once '../dbconfig.php';
header("content-type:text/html;charset=utf-8");

$query = "select * from student where studentId ='" . $_POST['studentId'] . "'";
$result = mysql_query($query);
$num = mysql_num_rows($result);
// 取得结果集中行的数目
if (! $num) {
    echo "注册失败！！！该考生号暂时无法参加考试<br/>";
    echo "<a href='register.php'>重注册</a>";
} else {
    $password = $_REQUEST['password'];
    $password2 = sha1($password);
    // sql语句中字符串数据类型都要加引号，数字字段随便
    $sql = "UPDATE student SET password='$password2' where studentId='" . $_POST['studentId'] . "'";    
    if (mysql_query($sql)) {
        echo "注册成功！！！<br/>";
        echo "<a href='login.php'>去登录</a>";
    } else {
        echo "注册失败！！！<br/>";
        echo "<a href='register.php'>重注册</a>";
    }
}