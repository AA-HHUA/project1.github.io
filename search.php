<!DOCTYPE html>
<html>
<head>
    <title>失物招领首页</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="table.css">
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
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 18px;
        margin-top: 20px;
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
    <div class="right-block">
        <form action="">
            <input type="text" placeholder="输入关键词搜索...">
            <button type="submit" name="search">搜索</button>
            <button type="submit"  name="advanced-search">高级搜索</button>
        </form>
    </div>
</div>
<div class="f"><font><center>物品信息</center></font></div>
<table id="myTable"  style="width: 80%; border: 1px solid black; margin: auto; text-align: center; vertical-align: middle;">
    <tr>
        <th>发起人</th>
        <th>物品名称</th>
        <th>物品描述</th>
        <th>丢物时间</th>
        <th>联系电话</th>
        <th>选择</th>
    </tr>

    <?php
    // 连接数据库
    $conn = mysqli_connect("127.0.0.1","root","123456","demo4");

    // 检查用户点击的按钮
    if (isset($_GET['search'])) {
        // 获取搜索关键词
        $keyword = $_GET['item'];

        // 查询数据库
        $query = "SELECT * FROM find WHERE item LIKE '%$keyword%'";
        $result = mysqli_query($conn, $query);

        // 处理查询结果
        if (mysqli_num_rows($result) > 0) {
            // 输出搜索结果
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["item"] . "</td>";
                echo "<td>" . $row["des"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["tel"] . "</td>";
                echo '<td><button onclick="showAlert()">领物</button></td>';
                echo "</tr>";

            }
        } else {
            echo "未找到匹配的商品";
        }
    } elseif (isset($_GET['advanced-search'])) {
        // 进行模糊搜索或其他高级搜索操作
        // 根据需求进行相关处理
    } else {
        echo "未知的操作";
    }

    // 关闭数据库连接
    mysqli_close($conn);
    ?>
</table>

<script>
    function showAlert() {
        // 显示警示框
        var result = confirm("是否确认领物？");
        if (result) {
            // 跳转到指定页面
            window.location.href = "history.php"; // 将 "lingyigeyemian.php" 替换为你要跳转的页面的 URL
        }
    }
</script>
<footer>
    <div class="copyright">
        版权信息 © 2023 GAO.高.FUTRUE
    </div>
</footer>

</body>
</html>





