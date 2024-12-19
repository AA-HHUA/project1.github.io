<?php
if(isset($_GET['item'])) {
    $item = $_GET['item'];

    // 1.连接数据库
    $conn = mysqli_connect("127.0.0.1","root","123456","demo4");

    // 2.判断数据库是否链接成功
    if(mysqli_connect_errno()){
        exit(mysqli_connect_error());
    }

    // 3.设置默认编码方式
    mysqli_set_charset($conn,"utf8");

    // 使用参数化查询来执行删除操作
    $sql = "DELETE FROM `find` WHERE `item`=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $item);
    $query = mysqli_stmt_execute($stmt);
    if ($query) {
        echo "<script>alert('删除成功');location='indext_ad.php';</script>";
    } else {
        echo "<script>alert('删除失败');</script>";
    }

    // 关闭数据库连接
    mysqli_close($conn);
} else {
    echo "<script>alert('未提供要删除的项目');</script>";
}
?>