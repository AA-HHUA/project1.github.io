<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="login_css.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="indext.php">首页</a></li>
        <li><a href="find.php">发布招领信息</a></li>
        <li><a href="sel.php">查找失物信息</a></li>
        <li><a href="self_we.php">联系我们</a></li>
        <center><font class="name">“Future失物招领”</font></center>
        <li style="float:right" class="deep"><a href="login.php">登录</a></li>
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
        <form action="dologin.php" method="post" name="form">
            <input type="text" name="user" placeholder="用户名" class="text">
            <input type="password" name="pwd" placeholder="密码" class="text">
            <div class="remember">
                <input type="checkbox" value="7" name="expire" id="expire" class="expire">
                <label for="expire" class="expire">记住密码</label>
            </div>
            <div class="submit">
                <input type="button" name="button" value="提交" onclick="sub()" class="submit">
            </div>
            <div class="no-account">
                <?php echo "<font>没有帐户？</font><a href='reg.php'>注册</a>&nbsp;&nbsp;&nbsp;&nbsp;";?>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function sub(){
        var user=document.getElementsByName("user")[0].value;//这是一段 JavaScript 代码，它使用 Document 对象的 getElementsByName 方法来获取 name 属性值为 “user” 的元素集合，并返回第一个元素。这通常用于在 Web 页面中获取特定元素的引用，以便进一步操作该元素，比如修改它的内容或样式
        var pwd=document.getElementsByName("pwd")[0].value;
        // var tel=document.getElementsByName("tel")[0].value;
        if(!user){
            alert("用户名为空,请输入用户名");
            return false;
        }
        if(!pwd){
            alert("密码为空,请输入密码");
            return false;
        }
        form.submit();
    }
</script>
<footer>
    <div class="copyright">
        版权信息 © 2023 GAO.高.FUTRUE
    </div>
</footer>

</body>
</html>