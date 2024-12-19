<!-- update_process.php -->
<?php
$item = $_POST['item'];
$username = $_POST['username'];
$tel=$_POST['phone'];
$time=$_POST['time'];
$description=$_POST['description'];

$conn = mysqli_connect("127.0.0.1", "root", "123456", "demo4");

if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$sql = "UPDATE `find` SET `username`=?, `tel`=?, `item`=?,`time`=?, `des`=? WHERE `item`=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssss", $username,$tel,$item,$time,$description,$item);
$query = mysqli_stmt_execute($stmt);
if ($query) {
    echo "<script>alert('更新成功');location='indext_ad.php';</script>";
} else {
    echo "<script>alert('更新失败');</script>";
}

mysqli_close($conn);
?>