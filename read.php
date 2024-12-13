<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ確認</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: black; 
            color: white;           
            font-size: 18px; 
            font-family: Arial, sans-serif; 
            line-height: 1.6;
            padding: 20px;  
            margin: 0;
        }

        .content {
            max-width: 800px;      
            margin: 0 auto;       
            text-align: left;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        canvas {
            display: block;
            margin: 20px auto;
            max-width: 600px;
            max-height: 500px;
            width: 100%;
            height: auto;
        }


    </style>
</head>
<body>
    <h1>
    <img src="./img/icon.png" alt="icon" style="vertical-align: middle; width: 70px;">  
        これまでの心理診断の結果
    </h1>
    <div class="content">
                <?php
        $data = file_get_contents('data/data.txt');
        echo nl2br($data); // 改行をHTMLに反映

        // JSONに変換
        $lines = explode("\n", trim($data)); // データを行ごとに分割
        $categories = ['Openness', 'Conscientiousness', 'Extraversion', 'Agreeableness', 'Neuroticism'];
        $scores = array_fill_keys($categories, 0);
        $count = 0;

        foreach ($lines as $line) {
            if (preg_match_all('/\b(Openness|Conscientiousness|Extraversion|Agreeableness|Neuroticism)のスコア：(\d+)\b/', $line, $matches)) {
                foreach ($matches[1] as $index => $category) {
                    $scores[$category] += (int)$matches[2][$index];
                }
                $count++;
            }
        }

        // 平均スコアを計算
        foreach ($scores as $key => $value) {
            $scores[$key] = $count ? round($value / $count, 2) : 0;
        }
        ?>
    </div>

    <!-- グラフ表示用のキャンバス -->
    <canvas id="resultsChart"></canvas>

    <script>
        // PHPからスコアを取得
        const scores = <?php echo json_encode($scores); ?>;
        
        // Chart.jsを使ってグラフを描画
        const ctx = document.getElementById('resultsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // 棒グラフ
            data: {
                labels: ["開放性", "誠実性", "外向性", "協調性", "神経症的傾向"],
                datasets: [{
                    label: '平均スコア',
                    data: Object.values(scores), // 各カテゴリーのスコア
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 15 // スコアの最大値を設定
                    }
                }
            }
        });
    </script>
</body>
</html>
