<?php
// 1. 连接数据库
$conn = mysqli_connect("127.0.0.1", "root", "123456", "demo4");

// 2. 检查数据库连接是否成功
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

// 3. 设置默认字符编码为 utf8
mysqli_set_charset($conn, "utf8");
ini_set('upload_max_filesize', '10M'); // 设置最大上传文件为 10MB
ini_set('post_max_size', '20M');       // 设置表单最大提交大小为 20MB
// 检查是否有文件上传
// var_dump($_FILES);
// var_dump($_FILES['imageUpload']['error']);
// var_dump($_REQUEST);
// exit;
if(isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] === UPLOAD_ERR_OK) {
    // 查询数据库中是否已存在相同的记录
    $result = mysqli_query($conn, "SELECT * FROM find WHERE username='" . $_POST["username"] . "' AND item='" . $_POST["item"] . "'");
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        // 如果存在相同记录，提示用户并返回上一页
        echo "<script>alert('你要找的物品已经存在，请自行领回');history.back();</script>";
    } else {
        // 处理文件上传
        $uploadDirectory = "./photo/"; // 存储上传文件的目录
        $targetFile = $uploadDirectory . basename($_FILES["imageUpload"]["name"]);

        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile)) {
            // 执行数据插入操作
            $result1 = mysqli_query($conn, "INSERT INTO find VALUES ('" . $_POST['username'] . "', '" . $_POST['gender'] . "', '" . $_POST['phone'] . "', '" . $_POST['item'] . "', '" . $_POST['location'] . "', '" . $_POST['description'] . "', '" . $_POST['time'] . "', '" . $targetFile . "')");

            if ($result1) {
                // 发布成功
                echo "<script>alert('您的丢失物品已经发布，请耐心等待');location.href='indext_u.php'</script>";
            } else {
                // 发布失败
                echo "<script>alert('发布失败');history.back();</script>";
            }
        } else {
            // 文件移动失败
            echo "<script>alert('文件上传失败');history.back();</script>";
        }
    }
} else {
    // 文件上传出错
    $uploadErrors = array(
        UPLOAD_ERR_INI_SIZE => '上传的文件超过了 php.ini 中 upload_max_filesize 指令规定的值',
        UPLOAD_ERR_FORM_SIZE => '上传的文件超过了 HTML 表单中 MAX_FILE_SIZE 指定的值',
        UPLOAD_ERR_PARTIAL => '文件只有部分被上传',
        UPLOAD_ERR_NO_FILE => '没有文件被上传',
        UPLOAD_ERR_NO_TMP_DIR => '找不到临时文件夹',
        UPLOAD_ERR_CANT_WRITE => '文件写入失败',
        UPLOAD_ERR_EXTENSION => 'PHP 扩展阻止了文件上传'
    );
    
    $error_message = isset($uploadErrors[$_FILES['imageUpload']['error']]) ? $uploadErrors[$_FILES['imageUpload']['error']] : '未知错误';
    echo "<script>alert('文件上传出错: $error_message');history.back();</script>";
}
?>