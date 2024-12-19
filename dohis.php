<?php
//1.链接数据库
$conn = mysqli_connect("127.0.0.1","root","123456","demo4");
//2.判断数据库是否链接成功
if(mysqli_connect_errno()){
    exit(mysqli_connect_error());
}
//3.设置默认编码方式
mysqli_set_charset($conn,"utf8");
$result=mysqli_query($conn,"select *from history where user='".$_POST["item"]."'");
$num = mysqli_num_rows($result);
if ($num > 0){
    echo "<script>alert('物品已被领取');history.back();</script>";
}
$result1 = mysqli_query($conn,"insert into history values('".$_POST['username']."','".$_POST['gender']."','".$_POST['phone']."','".$_POST['item']."','".$_POST['location']."','".$_POST['time']."')");
if ($result1==true){
    //注册成功
    echo "<script>alert('恭喜".$_POST["user"]."物品领取成功');location.href='indext_u.php'</script>";
}else{
    //注册失败
    echo "<script>alert('领取失败');history.back();</script>";
}