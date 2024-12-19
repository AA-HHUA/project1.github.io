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
        font-weight: bold;
    }

    .form-row input, .form-row textarea {
        width: 300px;
        padding: 5px;
        font-size: 16px;
        background-color: #fff6f0b5;
        border-radius: 15px;
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
        border: 2px solid;
        border-radius: 15px;
    }
    .form-gan{
        padding-right: 230px;
        font-weight: bold;
    }

</style>
<body>
<nav>
    <ul>
        <li><a href="indext.php">首页</a></li>
        <li class="deep"><a href="find.php">发布招领信息</a></li>
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
    <div class="f"><font><center>失物招领基本信息</center></font></div>
    <div class="centered-block">

        <form action="dofind.php" method="post" enctype="multipart/form-data">
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
                <label for="item">失物名称：</label>
                <input type="text" id="item" name="item" required>
            </div>

            <div class="form-row">
                <label for="location">失物地点：</label>
                <input type="text" id="location" name="location" required>
            </div>

            <div class="form-row">
                <label for="time">失物时间：</label>
                <input type="datetime-local" id="time" name="time" required>
            </div>

            <div class="form-row">
                <label for="description">失物描述：</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-row">
                <label for="imageUpload">图片上传</label>
                <input type="file" id="imageUpload" name="imageUpload" accept="image/*" required>
            </div>

            <input type="submit" value="提交">
        </form>
    </div>
</div>
<script>

</script>
<footer>
    <div class="copyright">
        版权信息 © 2023 GAO.高.FUTRUE
    </div>
</footer>

</body>
</html>