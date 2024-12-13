<?php
// POSTデータを取得
$questions = [];
for ($i = 1; $i <= 15; $i++) {
    $questions[$i] = $_POST['question' . $i];
}
// $question1 = $_POST['question1'];
// $question2 = $_POST['question2'];
// $question3 = $_POST['question3'];

// 質問をカテゴリーに分類
$category = [
    'Openness' => [$questions[1], $questions[2], $questions[3]],
    'Conscientiousness' => [$questions[4], $questions[5], $questions[6]],
    'Extraversion' => [$questions[7], $questions[8], $questions[9]],
    'Agreeableness' => [$questions[10], $questions[11], $questions[12]],
    'Neuroticism' => [$questions[13], $questions[14], $questions[15]],
];
// 各カテゴリーのスコアを計算
$openness = array_sum($category['Openness']);
$conscientiousness = array_sum($category['Conscientiousness']);
$extraversion = array_sum($category['Extraversion']);
$agreeableness = array_sum($category['Agreeableness']);
$neuroticism = array_sum($category['Neuroticism']);

// $openness = $question1 + $question2 + $question3;
// $conscientiousness = $question4 + $question5 + $question6;

//カテゴリー別の点数の評価
function evaluateCategory($score){
    if ($score <= 6) {
        return '低い';
    } elseif ($score <= 10) {
        return '中くらい';
    } else {
        return '高い';
    }
}
$evaluation = [
    'Openness' => evaluateCategory($openness),
    'Conscientiousness' => evaluateCategory($conscientiousness),
    'Extraversion' => evaluateCategory($extraversion),
    'Agreeableness' => evaluateCategory($agreeableness),
    'Neuroticism' => evaluateCategory($neuroticism),
];

//コメントを作成
$comment = [];
if ($evaluation['Openness'] === '高い' && $evaluation['Neuroticism'] === '高い') {
    $comments[] = "想像力が高まっていますが、ストレスや不安を感じやすい日です。リラックスする時間を大切にしましょう。";
}
if ($evaluation['Openness'] === '低い' && $evaluation['Conscientiousness'] === '高い') {
    $comments[] = "計画的に行動できる日です。地道な作業に集中すると良い結果が得られるでしょう。";
}
if ($evaluation['Conscientiousness'] === '低い' && $evaluation['Extraversion'] === '高い') {
    $comments[] = "今日は自由奔放な日になりそうです。新しい人と出会ったり、新しいことに挑戦すると楽しい時間を過ごせます。";
}
if ($evaluation['Agreeableness'] === '低い' && $evaluation['Neuroticism'] === '高い') {
    $comments[] = "感情的に揺れやすい日ですが、自分の意見を主張するのには向いているかもしれません。ただし衝突には注意しましょう。";
}
if ($evaluation['Extraversion'] === '高い' && $evaluation['Agreeableness'] === '高い') {
    $comments[] = "人と交流するのが楽しい一日です。友人や同僚とのコミュニケーションを大切にしましょう。";
}
if ($evaluation['Extraversion'] === '低い' && $evaluation['Neuroticism'] === '高い') {
    $comments[] = "一人で過ごす時間を確保するのが良いでしょう。気分転換をしつつ、リラックスを心がけてください。";
}
if ($evaluation['Openness'] === '中程度' && $evaluation['Conscientiousness'] === '中程度') {
    $comments[] = "バランスの取れた日です。特に目立った特徴はありませんが、穏やかに過ごせるでしょう。";
}
if ($evaluation['Openness'] === '高い' && $evaluation['Agreeableness'] === '高い') {
    $comments[] = "柔軟な思考と優しさが光る日です。新しいアイデアを他者と共有すると良い影響を与えるでしょう。";
}
if ($evaluation['Agreeableness'] === '低い' && $evaluation['Conscientiousness'] === '低い') {
    $comments[] = "今日は自己中心的になりがちな傾向があります。周囲への配慮を心がけましょう。";
}
if ($evaluation['Openness'] === '低い' && $evaluation['Neuroticism'] === '低い') {
    $comments[] = "安定して落ち着いた日です。大きな変化や刺激を求めず、日常を楽しむのが良いでしょう。";
}
if ($evaluation['Conscientiousness'] === '中程度' && $evaluation['Agreeableness'] === '中程度') {
    $comments[] = "適度に計画的で周囲とも調和が取れている日です。目標を無理せず進めましょう。";
}
//コメントを結合
$finalComment = implode(" ", $comments);

$time =  date('Y/m/d H:i:s');
$data = '日付：' . $time . 
'/ Oppennessのスコア：' . $openness  . 
'/ Conscientiousnessのスコア：' . $conscientiousness . 
'/ Extraversionのスコア：' . $extraversion . 
'/ Agreeablenessのスコア：' . $agreeableness . 
'/ Neuroticismのスコア：' . $neuroticism  . 
"\n";
file_put_contents('data/data.txt', $data, FILE_APPEND);

$chartData = [
    'Openness' => $openness,
    'Conscientiousness' => $conscientiousness,
    'Extraversion' => $extraversion,
    'Agreeableness' => $agreeableness,
    'Neuroticism' => $neuroticism,
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>診断結果</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <h1>
    <img src="./img/icon.png" alt="icon" style="vertical-align: middle; width: 70px;">  
        診断結果
    </h1>

    <div class="chart-container"> 
    <div class="comment-box"><?php echo $finalComment?></div>
    <canvas id="radarChart"></canvas>
    </div>

    <div class="pastData">
    <h3>過去のスコアを確認しましょう！</h3>
    <ul>
        <li><a href="read.php">確認する</a></li>
    </ul>
    </div>

    <div class="returnTop"> 
        <form action="post.php" method="get" style="display: inline;">
        <button type="submit">『心理診断』に戻る</button>
        </form>
        </div>
<script>
const chartData = <?php echo json_encode($chartData); ?>;

//レーダーチャートの設定
const ctx = document.getElementById('radarChart').getContext('2d');
new Chart(ctx, {
    type: 'radar',
    data: {
        //データの各項目のラベル（上から時計回り）
        labels: ["開放性", "誠実性", "外向性", "協調性", "神経症的傾向"],
        datasets: [{
            //グラフ全体のラベル
            label: '今日の心理診断結果',
            //グラフのデータ(上から時計回り)
            data: Object.values(chartData),
            //グラフを塗りつぶすかどうか。
            fill: true,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',

        }]
    },
    options: {
        scales: {
            r: {
                beginAtZero: true,
                max: 15 //各カテゴリーの最大スコア
            }
        }
    }
});
</script>
</body>

</html>
