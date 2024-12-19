<?php
// 开启错误报告
error_reporting(E_ALL);
ini_set('display_errors', 0);

// 引入 QR 码库
require_once('./phpqrcode-master/qrlib.php'); // 确保路径正确

// 要生成二维码的 这这里该
$link = 'http://localhost:3000/find.php';
// var_dump($link);
// 设置响应类型为 PNG 图片
// header('Content-Type: image/png');

// 生成二维码并直接输出
// QRcode::dump($link);
Qrcode::png($link,'qrcode.png', 'L', '5');
echo "<img src='qrcode.png'>"

?>
