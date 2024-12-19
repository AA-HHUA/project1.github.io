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
    #table_body a{
        width: 50px;
        height: 30px;
        background:radial-gradient(#f3eae9, #cda5a0) ;
        text-decoration: none;
        color: black;
    }
    #table_body a:hover{
        width: 50px;
        height: 30px;
        background:radial-gradient(#f3eae9, #ffffff) ;
        text-decoration: none;
        color: black;
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

        </form>
    </div>
</div>
<div class="f"><font><center>物品调整信息</center></font></div>
<!-- 引入 jQuery 库 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- 引入 jQuery 库 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content">
    <table id="myTable" style="width: 80%; border: 1px solid black; margin: auto; text-align: center; vertical-align: middle;">
        <thead>
        <tr>
            <th>发起人</th>
            <th>物品名称</th>
            <th>物品描述</th>
            <th>丢物时间</th>
            <th>联系电话</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        </thead>
        <tbody id="table_body">
        <?php
        //1.链接数据库
        $conn = mysqli_connect("127.0.0.1","root","123456","demo4");
        //2.判断数据库是否链接成功
        if(mysqli_connect_errno()){
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
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["item"] . "</td>";
                echo "<td>" . $row["des"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["tel"] . "</td>";
                echo '<td><a href="admin_update.php?item=' . urlencode($row['item']) . '">修改</a></td>';
                echo '<td><a href="admin_delete.php?item=' . urlencode($row['item']) . '">删除</a></td>';
                echo "</tr>";
            }
        }
        mysqli_close($conn); // 关闭数据库连接
        ?>


        </tbody>
    </table>
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
    </tbody>
    </table>


    <script>
        var currentPage = <?php echo $current_page; ?>;
        var totalPages = <?php echo ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM find"))/5); ?>;

        function showAlert() {
            // 显示警示框
            var result = confirm("是否确认领物？");
            if (result) {
                // 跳转到指定页面
                window.location.href = "history.php"; // 将 "lingyigeyemian.php" 替换为你要跳转的页面的 URL
            }
        }


    </script>
</div>


<script>
    var currentPage = 1; // 当前页数

    // 请求并显示当前页的数据
    function showCurrentPageData() {
        $.ajax({
            url: "get_page_data.php", // 替换为获取当前页数据的 PHP 脚本的 URL
            type: "GET",
            data: {
                currentPage: currentPage
            },
            success: function(response) {
                $("#tableBody").html(response);
            },
            error: function() {
                console.log("Error occurred while fetching data.");
            }
        });
    }

    // 显示下一页的数据
    function showNextPage() {
        currentPage++;
        showCurrentPageData();
    }

    // 绑定按钮点击事件
    $("#nextPageButton").click(function() {
        showNextPage();
    });

    // 初始化显示第一页的数据
    showCurrentPageData();
</script>

<footer>
    <div class="copyright">
           
    </div>
</footer>

</body>
</html>



