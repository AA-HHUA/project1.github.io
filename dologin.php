<?php
$expire=empty($_POST['expire'])?-1:intval($_POST['expire']);
//1.链接数据库
$conn = mysqli_connect("127.0.0.1","root","123456","demo4");
//2.判断数据库是否链接成功
if(mysqli_connect_errno()){
    exit(mysqli_connect_error());
}
//3.设置默认编码方式
mysqli_set_charset($conn,"utf8");
$result=mysqli_query($conn,"select *from user where user='".$_POST["user"]."'and pwd='".$_POST["pwd"]."'");
$num = mysqli_num_rows($result);
if ($num > 0){
    // 在登录成功后，将用户名保存在会话中
    setcookie("name",$_POST['user'],time()+3600*24*$expire);
    setcookie("pwd",$_POST['pwd'],time()+3600*24*$expire);
    //登陆成功跳转页面
    //开启session
    session_start();
    $_SESSION["username"] = $_POST['user']; // 假设 $username 是从数据库中获取的用户名
    header("location:indext_u.php");
    exit();
}
$result1 = mysqli_query($conn,"select *from admin where user='".$_POST["user"]."'and pwd='".$_POST["pwd"]."'");
if ($result1==true){
    // 在登录成功后，将用户名保存在会话中
    setcookie("name",$_POST['user'],time()+3600*24*$expire);
    setcookie("pwd",$_POST['pwd'],time()+3600*24*$expire);
    //登陆成功跳转页面
    //开启session
    session_start();
    $_SESSION["username"] = $_POST['user']; // 假设 $username 是从数据库中获取的用户名
    header("location:indext_ad.php");
    exit();
}else{
    //注册失败
    echo "<script>alert('登录失败');history.back();</script>";
}