<?php
// 获取表单数据
$name = $_POST["name"]; 
$mail = $_POST["mail"];
$hometown = $_POST["hometown"];
$hobbies = $_POST["hobbies"];

// 拼接数据为字符串
$delimiter = ",";
$data = date("Y-m-d H:i:s") . $delimiter . $name . $delimiter . $mail . $delimiter . $hometown . $delimiter . $hobbies;

// 写入文件
$file = fopen("data/data.txt", "a");
fwrite($file, $data . "\n");
fclose($file);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        h1, h2 {
            color: #333;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            color: white; /* 设置按钮文本颜色为白色 */
            text-decoration: none; /* 确保按钮没有下划线 */
            display: inline-block; /* 使链接表现为块元素 */
            background-color: #007bff; /* 按钮背景色 */
            padding: 10px 20px; /* 按钮内边距 */
            border-radius: 5px; /* 圆角 */
            transition: background-color 0.3s; /* 背景色过渡效果 */
            margin: 10px 0; /* 增加与下方元素的间距 */
        }
        .button:hover {
            background-color: #0056b3; /* 悬停时的背景色 */
            text-decoration: none; /* 悬停时确保没有下划线 */
        }
    </style>
</head>
<body>
    <h1>書き込みしました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2>

    <p>
        <a class="button" href="post.php">戻る</a>
    </p>

    <p>
        <a class="button" href="read.php">データ表示</a>
    </p>
</body>
</html>