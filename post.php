<html>
<head>
    <meta charset="utf-8">
    <title>データ入力</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        form label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        form input[type="text"] {
            width: 300px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 15px;
            transition: background-color 0.3s; /* 添加背景色过渡效果 */
        }
        form input[type="submit"]:hover {
            background-color: #45a049; /* 悬停时的背景色 */
        }
        a {
            color: white; /* 设置按钮文本颜色为白色 */
            text-decoration: none;
            display: inline-block; /* 使链接表现为块元素 */
            background-color: #007bff; /* 按钮背景色 */
            padding: 10px 20px; /* 按钮内边距 */
            border-radius: 5px; /* 圆角 */
            transition: background-color 0.3s; /* 背景色过渡效果 */
            margin-top: 10px; /* 增加与上方元素的间距 */
            font-size: 16px; /* 设置按钮字体大小 */
        }
        a:hover {
            background-color: #0056b3; /* 悬停时的背景色 */
        }
    </style>
</head>
<body>
    <form action="write.php" method="post">
        <label for="name">お名前:</label>
        <input type="text" id="name" name="name">

        <label for="mail">EMAIL:</label>
        <input type="text" id="mail" name="mail">

        <label for="hometown">出身地:</label>
        <input type="text" id="hometown" name="hometown">

        <label for="hobbies">趣味:</label>
        <input type="text" id="hobbies" name="hobbies">

        <input type="submit" value="送信">
    </form>
    <!-- 添加データ表示按钮 -->
    <a href="read.php">データ表示</a>
</body>
</html>