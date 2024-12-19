<!DOCTYPE html>
<html>
<head>
    <title>失物招领首页</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="table.css">
    <style type="text/css">
        .we {
            margin-top: 10px;
        }
        .centered-block {
            margin-left: 20%;
            margin-right: 20%;
            display: flex;
            background-color: #e8e8e8;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: row-reverse;
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
        .f {
            margin-left: 20%;
            margin-right: 20%;
            font-size: 24px;
            margin-top: 5%;
            margin-bottom: 10px;
            background: radial-gradient(#f3eae9, #e3b6b1);
        }
        #myTable {
            width: 80%;
            border: 2px solid black;
            margin: auto;
            text-align: center;
            vertical-align: middle;
        }
        .image-preview {
            position: relative;
            cursor: pointer; /* 鼠标悬停时显示手型 */
        }
        .image-preview img {
        display: none; /* 默认隐藏图片 */
        width: 100px; /* 设置宽度 */
        height: auto; /* 高度自适应 */
        position: absolute; 
        bottom: 30px; 
        left: 50%; 
        transform: translateX(-50%); 
        z-index: 1; 
        border: 1px solid #ccc; 
        background: #fff; 
        transition: transform 0.3s ease; /* 添加过渡效果 */
    }
    .image-preview:hover img {
        display: block; /* 鼠标悬停时显示图片 */
        transform: translateX(-50%) scale(10); /* 放大10倍 */
    }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="indext.php">首页</a></li>
        <li><a href="find.php">发布招领信息</a></li>
        <li class="deep"><a href="sel.php">查找失物信息</a></li>
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
        <form action="search.php">
            <input type="text" placeholder="输入关键词搜索..." name="item">
            <button type="submit" name="search">搜索</button>
        </form>
    </div>
</div>
<div class="f"><font><center>物品信息</center></font></div>
<!-- 引入 jQuery 库 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div id="content">
    <table id="myTable">
        <thead>
            <tr>
                <th>发起人</th>
                <th>物品名称</th>
                <th>物品描述</th>
                <th>丢物时间</th>
                <th>联系电话</th>
                <th>选择</th>
                <th>查看图片</th>
            </tr>
        </thead>
        <tbody id="table_body">
        <?php
        // 1.链接数据库
        $conn = mysqli_connect("127.0.0.1", "root", "123456", "demo4");
        // 2.判断数据库是否链接成功
        if (mysqli_connect_errno()) {
            exit(mysqli_connect_error());
        }

        // 每页显示的记录数
        $page_size = 5;
        // 当前页码
        $current_page = 1;
        // 判断当前页码
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $current_page = $_GET['page'];
        }

        // 查询总记录数
        $sql = "SELECT COUNT(*) AS total FROM find";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];

        // 计算总页数
        $total_pages = ceil($total_records / $page_size);
        // 计算起始记录条数
        $start_record = ($current_page - 1) * $page_size;

        // 从数据库获取符合条件的物品
        $sql = "SELECT * FROM find LIMIT {$start_record}, {$page_size}";
        $result = mysqli_query($conn, $sql);

        // 检查是否有结果
        if (mysqli_num_rows($result) > 0) {
            // 输出每行数据到表格中
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["item"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["des"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["time"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tel"]) . "</td>";
                echo '<td><button onclick="showAlert()">领物</button></td>';
                // 查看图片的栏位
                echo '<td>
                    <div class="image-preview">
                        <img src="' . htmlspecialchars($row["image_url_new"]) . '" alt="图片">
                        <span>查看图片</span>
                    </div>
                </td>';
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="page-info" style="text-align:center;">
    <p><?php echo "总共 " . $total_pages . " 页，当前第 " . $current_page . " 页"; ?></p>
</div>
<div id="pagination" style="text-align:center; margin-top:10px;">
    <?php if ($current_page > 1): ?>
        <a href="?page=<?php echo ($current_page - 1); ?>">上一页</a>
    <?php endif; ?>
    <?php if ($current_page < $total_pages): ?>
        <a href="?page=<?php echo ($current_page + 1); ?>">下一页</a>
    <?php endif; ?>
</div>

<script>
    function showAlert() {
        var result = confirm("是否确认领物？");
        if (result) {
            window.location.href = "history.php"; // 跳转到指定页面
        }
    }
</script>

<footer>
    <div class="copyright">
      
    </div>
</footer>
</body>
</html>