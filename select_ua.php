<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="login_css.css">
    <style type="text/css">
        .left {
            float: right;
            margin: 45px;
            background: radial-gradient(#f3eae9, #e3b6b1);
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px solid #dabdb8;
            border-radius: 10px;
        }
        .right{
            float: right;
            margin: 45px;
            background:radial-gradient(#f3eae9, #e3b6b1);
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px solid #dabdb8;
            border-radius: 10px;
        }
        .left a {
            display: block;
            color: #333;
            text-align: center;
            padding: 16px 25px;
            text-decoration: none;
        }

        .left a:hover {
            font-weight: bold;
        }
        .right a {
            display: block;
            color: #333;
            text-align: center;
            padding: 16px 25px;
            text-decoration: none;
        }

        .right a:hover {
            font-weight: bold;
        }

    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="indext.php">首页</a></li>
        <li><a href="find.php">发布招领信息</a></li>
        <li><a href="sel.php">查找失物信息</a></li>
        <li><a href="self_we.php">联系我们</a></li>
        <center><font class="name">“Future失物招领”</font></center>
        <li style="float:right"><a href="login.php">登录</a></li>
        <li style="float:right"><a href="reg.php">注册</a></li>
    </ul>
</nav>
<div class="container">
    <div class="image">
        <img src="bg.jpg" alt="图片描述">
    </div>
    <div class="login">
        <div class="top">
            "Future失物招领"-登录
        </div>
        <div class="left"><a href="login.php">用户登录</a> </div>
        <div class="right"><a href="login.php">管理员登录</a> </div>
    </div>
</div>
<footer>
    <div class="copyright">
        版权信息 © 2023 GAO.高.FUTRUE
    </div>
</footer>

</body>
</html>