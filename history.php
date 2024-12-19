<!DOCTYPE html>
<html>
<head>
    <title>失物招领首页</title>
    <link rel="stylesheet" href="css.css">
</head>
<style type="text/css">
    .we{
        margin-top: 10px;
    }

    .centered-block {
        padding-top: 10px;
        margin-left: 20%;
        margin-right: 20%;
        display: flex;
        background-color: #efdbd9;
        align-items: center;
        justify-content: space-evenly;
        align-content: stretch;
        flex-direction: row-reverse;
        flex-wrap: nowrap;
        border-radius: 10px;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-row {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .form-row label {
        font-size: 16px;
        margin-right: 10px;
        white-space: nowrap;
    }

    .form-row input, .form-row textarea {
        width: 300px;
        padding: 5px;
        font-size: 16px;
    }

    .form-row input[type="text"],
    .form-row input[type="tel"],
    .form-row input[type="datetime-local"] {
        margin-right: 10px;
    }

    .form-row textarea {
        height: 100px;
    }

    form input[type="submit"] {
        padding: 10px 20px;
        margin-bottom: 20px;
        /* padding-bottom: 20px; */
        background:radial-gradient(#f3eae9, #e3b6b1);
        color: #000000;
        border: none;
        cursor: pointer;
        font-size: 18px;
        margin-top: 20px;
        border-radius: 15px;
    }
    .form-gan{
        padding-right: 230px;
    }
    .f {
        margin-left: 20%;
        margin-right: 20%;
        font-size: 24px;
        margin-top: 5%;
        margin-bottom: 10px;
    }
</style>
<body>




<nav>
    <ul>
        <li><a href="indext.php">首页</a></li>
        <li><a href="find.php">发布招领信息</a></li>
        <li><a href="sel.php">查找失物信息</a></li>
        <li><a href="self_we.php">联系我们</a></li>
        <center><font class="name">“Future失物招领”</font></center>
        <?php
        session_start(); // 启动会话

        // 如果当前用户已经登录，显示欢迎信息
        if (isset($_SESSION["username"])) {
            echo '<li style="float:right" class="we">欢迎你，' . $_SESSION["username"] . '</li>';
        }
        ?>
    </ul>
</nav>
<div>
    <?php
    //1.链接数据库
    $conn = mysqli_connect("127.0.0.1","root","123456","demo4");
    //2.判断数据库是否链接成功
    if(mysqli_connect_errno()){
        exit(mysqli_connect_error());
    }
    // 检查请求方法是否为 POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取要删除的物品ID
    $itemId = $_POST['item'];

    // 执行删除操作
    if ($itemId) {
        // 构建删除语句

        $deleteQuery=mysqli_query($conn,"DELETE FROM find WHERE item = '$itemId'");
        // 执行删除语句
        if ($deleteQuery>0) {
            echo '<script>alert("物品删除成功");</script>';

            $result=mysqli_query($conn,"select *from history where item='".$_POST["item"]."'");
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
        } else {
            echo  '<script>alert("物品删除失败: ' . mysqli_error($conn) . '");</script>';
        }
    } else {
        echo '<script>alert("物品ID不能为空");</script>';;
    }
    }
    ?>
    <div class="f"><font><center>失物招领基本信息</center></font></div>
    <div class="centered-block">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"">
            <div class="form-row">
                <label for="username">用户名：</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-gan">
                <label for="gender">性别：</label>
                <input type="radio" id="male" name="gender" value="男" required>
                <label for="male">男</label>
                <input type="radio" id="female" name="gender" value="女" required>
                <label for="female">女</label>
            </div>

            <div class="form-row">
                <label for="phone">手机号：</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-row">
                <label for="item">领取物品：</label>
                <input type="text" id="item" name="item" required>
            </div>

            <div class="form-row">
                <label for="location">失物时间：</label>
                <input type="text" id="location" name="location" required>
            </div>

            <div class="form-row">
                <label for="time">领取时间：</label>
                <input type="datetime-local" id="time" name="time" required>
            </div>

            <input type="submit" value="提交">
        </form>
    </div>
</div>
<footer>
    <div class="copyright">
        
    </div>
</footer>

</body>
</html>