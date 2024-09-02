<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>データ表示</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            position: relative; /* 使得列调整功能能够正常工作 */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid black;
            padding: 12px 16px;
            text-align: left;
            position: relative; /* 使得列调整功能能够正常工作 */
        }
        th {
            background-color: #f2f2f2;
            cursor: pointer;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .hidden {
            display: none;
        }
        .controls {
            margin-bottom: 20px;
        }
        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .search-container input[type="text"] {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-right: 10px;
        }
        .control-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin-right: 5px;
        }
        .control-btn:hover {
            background-color: #0056b3;
        }
        #rowCount {
            font-size: 14px;
            color: #666;
        }
        .resizer {
            width: 5px;
            cursor: col-resize;
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            z-index: 1;
        }
        a {
            color: white; /* 设置按钮文本颜色为白色 */
            text-decoration: none;
            display: inline-block; /* 使链接表现为块元素 */
            background-color: #007bff; /* 按钮背景色 */
            padding: 10px 20px; /* 按钮内边距 */
            border-radius: 5px; /* 圆角 */
            transition: background-color 0.3s; /* 背景色过渡效果 */
            margin-bottom: 10px; /* 增加与下方元素的间距 */
        }
        a:hover {
            background-color: #0056b3; /* 悬停时的背景色 */
        }
    </style>
</head>
<body>
    <!-- 添加データ表示按钮 -->
    <a href="post.php">データ入力</a>

    <div class="controls">
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="検索...">
            <button class="control-btn" onclick="toggleColumn(0)"><span class="bold">登録日時</span>の表示/非表示</button>
            <button class="control-btn" onclick="toggleColumn(1)"><span class="bold">氏名</span>の表示/非表示</button>
            <button class="control-btn" onclick="toggleColumn(2)"><span class="bold">Email</span>の表示/非表示</button>
            <button class="control-btn" onclick="toggleColumn(3)"><span class="bold">出身地</span>の表示/非表示</button>
            <button class="control-btn" onclick="toggleColumn(4)"><span class="bold">趣味</span>の表示/非表示</button>
        </div>
    </div>
    
    <table id="dataTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)" style="width: 10%;">登録日時<div class="resizer" onmousedown="initResize(event, 0)"></div></th>
                <th onclick="sortTable(1)" style="width: 15%;">氏名<div class="resizer" onmousedown="initResize(event, 1)"></div></th>
                <th onclick="sortTable(2)" style="width: 20%;">Email<div class="resizer" onmousedown="initResize(event, 2)"></div></th>
                <th onclick="sortTable(3)" style="width: 25%;">出身地<div class="resizer" onmousedown="initResize(event, 3)"></div></th>
                <th onclick="sortTable(4)" style="width: 30%;">趣味<div class="resizer" onmousedown="initResize(event, 4)"></div></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $file = fopen('data/data.txt', 'r'); // ファイルを開く

            // ファイル内容を1行ずつ読み込んで出力
            while ($str = fgets($file)) {
                $strData = explode(",", trim($str)); // 去掉行末的换行符
                echo "<tr>"; // 开始新行
                for ($i = 0; $i < count($strData); $i++) {
                    if (trim($strData[$i]) === '') {
                        echo "<td>--</td>"; // 输出占位符
                    } else {
                        echo "<td>" . htmlspecialchars($strData[$i]) . "</td>"; // 输出数据
                    }
                }
                echo "</tr>"; // 结束行
            }

            fclose($file); // ファイルを閉じる
            ?>
        </tbody>
    </table>
    
    <div id="rowCount"></div>

    <script>
        // 搜索功能
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#dataTable tbody tr');
            let count = 0;

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                let match = false;

                for (let i = 0; i < cells.length; i++) {
                    if (cells[i].textContent.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }

                if (match) {
                    row.style.display = '';
                    count++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('rowCount').textContent = `表示中の行数: ${count}`;
        });

        // 行高亮功能
        const rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(row => {
            row.addEventListener('mouseover', () => {
                row.style.backgroundColor = '#e0e0e0';
            });
            row.addEventListener('mouseout', () => {
                row.style.backgroundColor = '';
            });
        });

        // 列隐藏/显示功能
        function toggleColumn(index) {
            const cells = document.querySelectorAll(`#dataTable td:nth-child(${index + 1}), #dataTable th:nth-child(${index + 1})`);
            cells.forEach(cell => {
                cell.classList.toggle('hidden');
            });
        }

        // 排序功能
        function sortTable(colIndex) {
            const table = document.getElementById('dataTable');
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.rows);
            const isAscending = tbody.dataset.sortOrder === 'asc';

            rows.sort((a, b) => {
                const aText = a.cells[colIndex].textContent.trim();
                const bText = b.cells[colIndex].textContent.trim();
                return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
            });

            rows.forEach(row => tbody.appendChild(row)); // 重新附加排序后的行
            tbody.dataset.sortOrder = isAscending ? 'desc' : 'asc'; // 切换排序顺序
        }

        // 初始化行数显示
        document.getElementById('rowCount').textContent = `表示中の行数: ${rows.length}`;

        // 列宽调整功能
        let isResizing = false;
        let lastDownX = 0;
        let columnIndex;

        function initResize(e, index) {
            isResizing = true;
            lastDownX = e.clientX;
            columnIndex = index;
            document.addEventListener('mousemove', resizeColumn);
            document.addEventListener('mouseup', stopResize);
        }

        function resizeColumn(e) {
            if (!isResizing) return;
            const th = document.querySelector(`#dataTable th:nth-child(${columnIndex + 1})`);
            const newWidth = th.offsetWidth + (e.clientX - lastDownX);
            th.style.width = `${newWidth}px`;
            lastDownX = e.clientX;
        }

        function stopResize() {
            isResizing = false;
            document.removeEventListener('mousemove', resizeColumn);
            document.removeEventListener('mouseup', stopResize);
        }
    </script>
</body>
</html>