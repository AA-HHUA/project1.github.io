<!DOCTYPE html>
<html>
<head>
    <title>失物招领首页</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="login_css.css">
</head>
<style type="text/css">
    .we{
        margin-top: 10px;
    }
    .centered-block {
        margin-left: 20%;
        margin-right: 20%;
        display: flex;

        background-color: #e8e8e8;
        align-items: center;
        justify-content: space-evenly;
        align-content: stretch;
        flex-direction: row-reverse;
        flex-wrap: nowrap;
    }
    form {
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    #content form {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-content: center;
        justify-content: space-between;
        background: #eadbd8;
        margin-left: 20%;
        margin-right: 20%;
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
        background: radial-gradient(#f3eae9, #e3b6b1);
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
    .right-block {
        float: right;
        padding: 10px;
        margin: 3px;
    }
</style>
<body>
<nav>
    <ul>
        <li><a href="indext_ad.php">首页</a></li>
        <li><a href="admin_find.php">物品流动信息</a></li>
        <li class="deep"><a href="admin_alter.php">物品信息调整</a></li>
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
    <div class="right-block">
        <form action="search_ad.php">
            <input type="text" placeholder="输入关键词搜索..." name="item">
            <button type="submit" name="search">搜索</button>
            <button type="submit"  name="advanced-search">高级搜索</button>
        </form>
    </div>
</div>
<div class="f"><font><center>物品信息修改</center></font></div>

<!-- 引入 jQuery 库 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
$item = $_GET['item'];
$conn = mysqli_connect("127.0.0.1", "root", "123456", "demo4");

if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$stmt = mysqli_prepare($conn, "SELECT * FROM `find` WHERE `item` = ?");
mysqli_stmt_bind_param($stmt, "s", $item);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
?>
<div id="content">

    <form action="updata_use.php" method="post">
        <br>
        <div class="form-row">
            <label for="username">用户名：</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-row">
            <label for="phone">手机号：</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <div class="form-row">
            <label for="item">失物名称：</label>
            <input type="text" id="item" name="item" required>
        </div>


        <div class="form-row">
            <label for="time">失物时间：</label>
            <input type="datetime-local" id="time" name="time" required>
        </div>

        <div class="form-row">
            <label for="description">失物描述：</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <input type="submit" value="提交">
    </form>
</div>
<?php
mysqli_close($conn);
?>
<footer>
    <div class="copyright">
        版权信息 © 2023 GAO.高.FUTRUE
    </div>
</footer>

</body>
</html>



