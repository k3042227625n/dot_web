<?php

require_once('blog.php');
ini_set('display_errors', "On");

$blogs = $_POST;
// var_dump($blogs);

if (empty($blogs['title'])) {
    exit('タイトルを入力してください');
}

if (mb_strlen($blogs['title']) > 191) {
    exit('タイトルは191文字以下にしてください');
}

if (empty($blogs['content'])) {
    exit('本文を入力してください');
}

if (empty($blogs['category'])) {
    exit('カテゴリは必須です');
}

if (empty($blogs['publish_status'])) {
    exit('公開ステータスは必須です');
}

// インスタンス化
$blog = new Blog();
$blog->blogCreate($blogs);

?>

<p><a href="index2.php">Go back</a></p>