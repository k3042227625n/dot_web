<?php
require('../app/functions.php');           

// 1.データベース接続
// 引数：なし
// 返り値：接続結果を返す
function dbConnect() {
    $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
    $user = 'koku';
    $pass = '00000abc';
    
    try {
        $dbh = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);      
    } catch (Exception $e) {
        echo '接続失敗<br>' . $e->getMessage();
        exit();
    };

    return $dbh;
}

echo '<br>';

// 2.データを取得する
// 引数：なし
// 返り値：取得したデータ
function getAllBlog() {
    $dbh = dbConnect();
    // ①SQLの準備
    $sql = 'SELECT * FROM blog';
    // ②SQLの実行
    $stmt = $dbh->query($sql);
    // ③SQLの結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    $dbh = null;
}


// 3.カテゴリー名を表示
// 引数：数字
// 返り値：カテゴリーの文字列
function setCategoryName($category) {
    if ($category === '1') {
        return 'ブログ';
    } elseif ($category === '2') {
        return '日常';
    } else {
        return 'その他';
    }
}

function getBlog($id){
    if(empty($id)) {
        exit(不正です。);
      }
      $dbh = dbConnect();
      
      $stmt = $dbh->prepare('SELECT * FROM blog Where id = :id');
      $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if(!$result) {
        exit('ブログがありません。');
      }
      return $result;
}



date_default_timezone_set('Asia/Tokyo');
