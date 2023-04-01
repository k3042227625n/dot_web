<?php
$dsn = 'mysql:host=localhost;dbname=dot_app;charset=utf8';
$user = 'koku';
$pass = '00000abc';

try {
    $dbh = new PDO($dsn, $user, $pass, [
        // エラーが出た時の例外処理
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    // echo '接続成功<br>';
    // ①SQLの準備
    $sql = "SELECT * FROM data";
    // ②SQLの実行
    $stmt = $dbh->query($sql);
    // ③SQLの結果を受け取る
    // 結果をカラムのみ表示(インデックス非表示)
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    // var_dump($result);
} catch (Exception $e) {
    echo '接続失敗<br>' . $e->getMessage();
    exit();
};

echo "<br>";

date_default_timezone_set('Asia/Tokyo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1><?php echo date('Y/m/d H:i:s'); ?></h1>
    <h2>ブログ一覧</h2>

    <table>
        <tr>
            <th>No</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
        </tr>
        <?php foreach ($result as $column): ?>
        <tr>
            <td><?php echo $column['id'] ?></td>
            <td><?php echo $column['title'] ?></td>
            <td><?php echo $column['category'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>


