<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="login_css.css">
    <style type="text/css">
        .image {
            flex-basis: 50%;
            border: 1px solid #000;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login {
            flex-basis: 50%;
            padding: 15%;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            justify-content: center;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="indext.php">首页</a></li>
        <li><a href="find.php">发布招领信息</a></li>
        <li><a href="sel.php">查找失物信息</a></li>
        <li class="deep"><a href="self_we.php">联系我们</a></li>
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
<div class="container">
    <div class="image">
        <img src="bg.jpg" alt="图片描述">
    </div>
    <div class="login">
       <div class="top"> <center>联系我们<br>&#8619;温馨提示<br>如果想要修改物品信息请联系我们，由我们进行修改！&#8620;</center></div>
        <ul>
            <li>管理：futrue失物招领</li>
            <li>email：1223586971@qq.com</li>
            <li>手机号：13633702234</li>
        </ul>
    </div>
</div>

<footer>
    <div class="copyright">
        版权信息 © 2023 GAO.高.FUTRUE
    </div>
</footer>

</body>
</html>