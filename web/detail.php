<?php

require_once('blog.php');

// インスタンス化
$blog = new Blog();

// メソッド呼び出し
$result = $blog->getById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
    <link rel="stylesheet" href="style.css">

</head>
<body style="background-color: aqua;">
    <h2>ブログ詳細</h2>
    <h3>タイトル：<?php echo $result['title'] ?></h3>
    <p>投稿日時：<?php echo $result['post_at'] ?></p>
     <!-- メソッド呼び出し -->
    <p>カテゴリ：<?php echo $blog->setCategoryName($result['category']) ?></p>
    <hr>
    <p>本文：<?php echo $result['content'] ?></p>

  <p><a href="index2.php">Go back</a></p>
</body>
</html>

