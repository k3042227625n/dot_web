<?php
require_once('dbc.php');           
// ブログデータの新規作成とトランザクション
// 新規データ作成の流れ
// ①フォームから値を渡す
// ②フォームから値を受け取る
// ③バリデーション(検証)する
// 入力内容が正しい値かどうかチェックすること
// ④トランザクション(取引)を開始
// データをDBに入力するときに行う整合性を保つための仕組み
// ⑤データをDBに登録する
$blogData = getAllBlog();

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
    <p><a href="form.html">新規作成</a></p>

    <table>
        <tr>
            <th>No</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
        </tr>
        <?php foreach ($blogData as $column): ?>
        <tr>
            <td><?php echo $column['id'] ?></td>
            <td><?php echo $column['title'] ?></td>
            <td><?php echo setCategoryName($column['category']) ?></td>
            <!-- クリックするとphp側でidの値を受け取る -->
            <td><a href="detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>


