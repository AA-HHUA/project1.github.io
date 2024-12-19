<?php
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
    echo "<script>alert('用户信息已存在');history.back();</script>";
}
$result1 = mysqli_query($conn,"insert into user  values('".$_POST['user']."','".$_POST['pwd']."','".$_POST['tel']."',1)");
if ($result1==true){
    //注册成功
    echo "<script>alert('恭喜".$_POST["user"]."注册成功');location.href='login.php'</script>";
}else{
    //注册失败
    echo "<script>alert('注册失败');history.back();</script>";
}