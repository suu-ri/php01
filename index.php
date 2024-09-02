<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>メインメニュー</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none; /* 去掉默认的列表样式 */
            padding: 0;
        }
        li {
            margin: 10px 0; /* 每个列表项之间的间距 */
        }
        a {
            text-decoration: none; /* 去掉下划线 */
            color: white;
            background-color: #007bff; /* 按钮背景色 */
            padding: 10px 20px; /* 按钮内边距 */
            border-radius: 5px; /* 圆角 */
            transition: background-color 0.3s; /* 背景色过渡效果 */
            display: inline-block; /* 使链接表现为块元素 */
        }
        a:hover {
            background-color: #0056b3; /* 悬停时的背景色 */
        }
    </style>
</head>
<body>
    <h1>メインメニュー</h1>
    <ul>
        <li><a href="post.php">データ入力</a></li>
        <li><a href="read.php">データ表示</a></li>
    </ul>
</body>
</html>