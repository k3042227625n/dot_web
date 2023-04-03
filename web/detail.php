<?php


$id = $_GET['id'];

if(empty($id)) {
  exit(不正です。);
}
// echo $id;

function dbConnect() {
  $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
  $user = 'koku';
  $pass = '00000abc';
  
  try {
      $dbh = new PDO($dsn, $user, $pass, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
          
      ]);      
  } catch (Exception $e) {
      echo '接続失敗<br>' . $e->getMessage();
      exit();
  };

  return $dbh;
}

$dbh = dbConnect();

// ①SQLの準備
// プレイスホルダー:id(直接値を入れない)
$stmt = $dbh->prepare('SELECT * FROM blog Where id = :id');
// 明示的に型を指定
$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
// ②SQLの実行
$stmt->execute();
// ③SQLの結果を受け取る
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$result) {
  exit('ブログがありません。');
}

// var_dump($result);



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
    <p>カテゴリ：<?php echo $result['category'] ?></p>
    <hr>
    <p>本文：<?php echo $result['content'] ?></p>

  <p><a href="dbc.php">Go back</a></p>
</body>
</html>

