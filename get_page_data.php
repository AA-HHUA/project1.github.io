<?php
$conn = mysqli_connect("127.0.0.1","root","123456","demo4");

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// 获取当前页数
$currentPage = $_GET['currentPage'];

// 在这里进行数据库查询或其他数据操作，获取新的页面数据
// 假设每页显示 10 条数据
$offset = ($currentPage - 1) * 5;  // 计算偏移量
$query = "SELECT * FROM products LIMIT 10 OFFSET $offset";  // 查询语句
// 执行查询并获取结果集
$result = mysqli_query($conn, $query);

// 拼接要返回的 HTML 字符串
$html = '';
while ($row = mysqli_fetch_assoc($result)) {
    // 根据数据库中的字段，拼接每条数据的 HTML
    $html .= '<tr>';
    $html .= '<td>' .$row["username"]. '</td>';  // 商品 ID
    $html .= '<td>'  . $row["item"] . '</td>';  // 商品名称
    $html .= '<td>'. $row["des"] .'</td>';  // 商品价格
    $html .= '<td>' . $row["time"] .  '</td>';  // 商品描述
    $html .= '<td>'  . $row["tel"] .  '</td>';  // 商品分类
    $html .= '<td> <button onclick="showAlert()">领物</button></td>';  // 商品创建时间
    // $html .= '<td>'  . $row["image_url_new"] .  '</td>';  // 商品url
    $html .= '</tr>';
}

// 将 HTML 字符串返回给前端
echo $html;

?>