<!DOCTYPE html>
<html>
<head>
    <title>失物招领首页</title>
    <link rel="stylesheet" href="css.css">
    <style type="text/css">.container {
            display: flex;
        }

        .left-large-block {
            flex-basis: 80%;
            display: flex;
            flex-wrap: wrap;
        }

        .right-small-block {
            flex-basis: 20%;
            padding-left: 30px;
            padding-right: 30px;
            background: linear-gradient(to right, #eadbd81a, #ede0da);
        }
        .small-block {
            width: 50%;
            height: 259px;
            border: 1px dashed #734d4d;
            box-sizing: border-box;
            border-radius: 10px;
            background-color: #eadbd8;
        }
        .people-list1{
            height: 50%;
        }
        .people-list1 li{
            padding-bottom: 20px;
            text-decoration: underline;
        }
        .people-list1 li:hover{
            padding-bottom: 20px;
            font-weight: bold;
            text-decoration: underline;
        }
        .people-list2{
            height: 50%;
        }
        .people-list2 li{
            padding-bottom: 20px;
            text-decoration: underline;
        }
        .people-list2 li:hover {
            padding-bottom: 20px;
            font-weight: bold;
            text-decoration: underline;
        }
        .im{
            width: 60%;
        }
        .fo {
            width: 60%;
            padding-left: 20px;
        }
        img{
            margin-top: 25px;
            width:200px;
            height: 80%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        img:hover{
            margin-top: 25px;
            width:220px;
            height: 80%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .container font{
            font-size: 20px;
        }
        span{
            font-size: 20px;
            font-weight: bold;
        }
        .asf{
            width: 100%;
            height: 30px;
            background: linear-gradient(to right, #eadbd8, #f8f3f06e);
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li class="deep"><a href="indext.php">首页</a></li>
        <li><a href="admin_find.php">物品流动信息</a></li>
        <li ><a href="admin_alter.php">物品信息调整</a></li>
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
    <div class="content">
        <div class="left-block">
            <marquee direction="left" behavior="scroll" scrollamount="5">小明因为发布虚假物品信息账号已被封，请各用户引以为戒</marquee>
        </div>

    </div>

    <div class="container">
        <div class="left-large-block">
            <div class="small-block">
                <table>
                    <tr>
                        <td width="60%" class="im"><img src="img\小猫.jpg"></td>
                        <td width="40%" class="fo"><span>发起人：梦儿</span><br><br>物品名称：花猫<br><br>丢失地点：公园<br><br>丢失时间：2023.12.12</td>
                    </tr>
                </table>
            </div>
            <div class="small-block">  <table>
                    <tr>
                        <td width="60%" class="im"><img src="img\小狗.jpg"></td>
                        <td width="40%" class="fo"><span>发起人：TOM</span><br><br>物品名称：旺财<br><br>丢失地点：小区<br><br>丢失时间：2023.10.12</td>
                    </tr>
                </table></div>
            <div class="small-block">
                <table>
                    <tr>
                        <td width="60%" class="im"><img src="img\鼠标.jpg"></td>
                        <td width="40%" class="fo"><span>发起人：小岑</span><br><br>物品名称：鼠标<br><br>丢失地点：cbd<br><br>丢失时间：2023.2.12</td>
                    </tr>
                </table>
            </div>
            <div class="small-block">  <table>
                    <tr>
                        <td width="60%" class="im"><img src="img\眼睛.jpg"></td>
                        <td width="40%" class="fo"><span>发起人：小孔</span><br><br>物品名称：眼睛<br><br>丢失地点：写字楼<br><br>丢失时间：2022.12.12</td>
                    </tr>
                </table></div>
        </div>
        <div class="right-small-block">
            <div class="asf">
                <font>最新资讯</font></div>
            <ul class="people-list1">
                <li class="person">里斯的小花猫找到了</li>
                <li class="person">小雨的雨伞找到了</li>
                <li class="person">TOM的鼠标找到了</li>
                <li class="person">梦儿的钥匙伞找到了</li>
                <li class="person">小陈的身份证找到了</li>
                <li class="person">梦寒的雨伞找到了</li>
            </ul>
            <div class="asf"><font>好人好事</font></div>
            <ul class="people-list2">
                <li class="person">雯雯帮助小龙寻找丢失的手机</li>
                <li class="person">小花帮小明寻找宠物</li>
            </ul>
        </div>

    </div>
    <footer>
        <div class="copyright">
            
        </div>
    </footer>

</body>
</html>