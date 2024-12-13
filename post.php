<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>今日の心理診断</title>
    <link rel="stylesheet" href="style.css"> 
</head>

<body>
    <div class="menu">
        <h1>
        <img src="./img/icon.png" alt="icon" style="vertical-align: middle; width: 70px;">  
        今日の心理診断
    </h1>
        <!-- <ul>
            <li>サンプルフォームに必要な情報を入れる(POST)</li>
        </ul> -->
    </div>
    <div class="form-container">
    <form action="write.php" method="post">
    <!-- Openness -->

    <h2>Openness（開放性）</h2>
    <p>1. 突然未知の惑星に住むことになったら、最初に何する？</p>
        <label><input type="radio" name="question1" value="1" required>地図を書く</label><br>
        <label><input type="radio" name="question1" value="3">新しい食べ物を試す</label><br>
        <label><input type="radio" name="question1" value="5">他の住民に挨拶する</label>

    <p>2. どこでもドアがあったら、どこに行く？</p>
        <label><input type="radio" name="question2" value="5" required>未知のジャングル</label><br>
        <label><input type="radio" name="question2" value="3">宇宙ステーション</label><br>
        <label><input type="radio" name="question2" value="1">世界中の美術館</label>

    <p>3. 魔法の絵筆を手に入れたら、何をかく？</p>
        <label><input type="radio" name="question3" value="5" required>現実では見たことのない生物</label><br>
        <label><input type="radio" name="question3" value="3">自分だけの理想の街</label><br>
        <label><input type="radio" name="question3" value="1">完璧な日の風景</label>

    <!-- Conscientiousness -->
    <h2>Conscientiousness（誠実性）</h2>
    <p>4. 明日まで課題を終わらせなきゃいけないのに友達に誘われたら、どうする？</p>
        <label><input type="radio" name="question4" value="5" required>課題を優先して断る</label><br>
        <label><input type="radio" name="question4" value="3">課題を半分だけ片付けて遊びに行く</label><br>
        <label><input type="radio" name="question4" value="1">遊んだ後、夜遅くまで頑張る</label>

    <p>5. 大事なイベントの前日です。とりあえず何をする？</p>
        <label><input type="radio" name="question5" value="5" required>明日の計画を完璧に立てる</label><br>
        <label><input type="radio" name="question5" value="3">最低限必要な準備をしてリラックス</label><br>
        <label><input type="radio" name="question5" value="1">明日考えようと思って寝る</label>

    <p>6. ゲームで村のリーダーに選ばれたら、最初に取り組むことは？</p>
        <label><input type="radio" name="question6" value="5" required>全員のスケジュールを管理する</label><br>
        <label><input type="radio" name="question6" value="3">村をきれいに整理整頓する</label><br>
        <label><input type="radio" name="question6" value="1">新しいルールを作る</label>

    <!-- Extraversion -->
    <h2>Extraversion（外向性）</h2>
    <p>7. 知らない人ばかりのパーティに誘われたら、どうする？</p>
        <label><input type="radio" name="question7" value="5" required>前のめりで行く</label><br>
        <label><input type="radio" name="question7" value="3">いやいや行く</label><br>
        <label><input type="radio" name="question7" value="1">一人で家にいる</label>

    <p>8. 急にスピーチを頼まれたら、どうする？</p>
        <label><input type="radio" name="question8" value="5" required>笑顔で承諾する</label><br>
        <label><input type="radio" name="question8" value="3">他に誰もいなかったら引き受ける</label><br>
        <label><input type="radio" name="question8" value="1">絶対に断る</label>

    <p>9. 新しい街に引っ越しました。最初にすることは？</p>
        <label><input type="radio" name="question9" value="5" required>近所の人に挨拶に行く</label><br>
        <label><input type="radio" name="question9" value="3">街を散策する</label><br>
        <label><input type="radio" name="question9" value="1">家でリラックスする</label>

    <!-- Agreeableness -->
    <h2>Agreeableness（協調性）</h2>
    <p>10. 忙しい時に友達から困っていると電話がきたら、どうする？</p>
        <label><input type="radio" name="question10" value="5" required>すぐに時間を作って助ける</label><br>
        <label><input type="radio" name="question10" value="3">時間ができたら助けると伝える</label><br>
        <label><input type="radio" name="question10" value="1">他の人に相談することを提案する</label>

    <p>11. チームで作業しているとき、みんなの意見がバラバラになったら、どうする？</p>
        <label><input type="radio" name="question11" value="5" required>まとめ役になって解決を試みる</label><br>
        <label><input type="radio" name="question11" value="3">自分の意見をしっかり主張する</label><br>
        <label><input type="radio" name="question11" value="1">周りに合わせる</label>

    <p>12. 隣人が玄関先に荷物を忘れたのを見たら、どうする？</p>
        <label><input type="radio" name="question12" value="5" required>すぐに知らせる</label><br>
        <label><input type="radio" name="question12" value="3">後で気づいたら伝える</label><br>
        <label><input type="radio" name="question12" value="1">特に何もしない</label>

    <!-- Neuroticism -->
    <h2>Neuroticism（神経症的傾向）</h2>
    <p>13. 突然、計画していたイベントが中止になった時の気持ちは？</p>
        <label><input type="radio" name="question13" value="1" required>他に楽しいことを見つける</label><br>
        <label><input type="radio" name="question13" value="3">少し動揺するが、切り替える</label><br>
        <label><input type="radio" name="question13" value="5">ずっとイライラする</label>

    <p>14. 大切に予定していたことが上手くいかなかったらどうする？</p>
        <label><input type="radio" name="question14" value="1" required>深呼吸して切り替える</label><br>
        <label><input type="radio" name="question14" value="3">次の計画を練る</label><br>
        <label><input type="radio" name="question14" value="5">一日中落ち込む</label>

    <p>15. 渋滞に巻き込まれて遅刻確定。どう感じてる？</p>
        <label><input type="radio" name="question15" value="1" required>他のことを考えて気を紛らわす</label><br>
        <label><input type="radio" name="question15" value="3">イライラするが落ち着こうとする</label><br>
        <label><input type="radio" name="question15" value="5">終始イライラしてしまう</label><br>

        <button type="submit">診断する</button>
    </form>
    </div>
    <script>
        // ラジオボタンがクリックされたら次の質問にスクロール
        document.querySelectorAll('input[type="radio"]').forEach((radio) => {
            radio.addEventListener('click', (event) => {
                const parentLabel = event.target.closest('label');
                const nextElement = parentLabel.nextElementSibling || parentLabel.parentElement.nextElementSibling;
                
                // 次の要素があればスクロール
                if (nextElement) {
                    nextElement.scrollIntoView({
                        behavior: 'smooth', // スムーズスクロール
                        block: 'center' // 中央に表示
                    });
                }
            });
        });
    </script>

</body>

</html>
