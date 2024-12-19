<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #qrcode {
            margin: 20px;
            width: 256px; /* 增加二维码大小 */
            height: 256px;
        }
    </style>
</head>
<body>
    <h1>扫描二维码填写信息</h1>
    <div id="qrcode"></div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.qrcode.min.js"></script>

    <script>
        $(document).ready(function() {
            const loginUrl = "http://localhost:3000/find.php"; // 替换为可访问的链接
            $("#qrcode").qrcode({
                text: loginUrl,
                width: 256, // 增加二维码大小
                height: 256
            });
        });
    </script>
</body>
</html>