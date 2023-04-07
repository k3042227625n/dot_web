<?php
// アクセス修飾子とはプロパティやメソッドのアクセス権を指定するもので、クラス定義には必ず明示
// private: 自クラス内のみアクセス可能
// protected: 自クラスか継承クラスからのみアクセス可能
// public: どこからでもアクセス可能

class Dbc 
{
    // 継承で共通化することで同じコードを何度も書かないようにする
    protected $table_name;

    protected function dbConnect() {
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

    public function getAll() {
        // クラス内で別のfunctionを使うときはthis
        $dbh = $this->dbConnect();
        $sql = "SELECT * FROM $this->table_name";
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
    
    
    
    public function getById($id){
        if(empty($id)) {
            exit(不正です。);
          }
          // クラス内で別のfunctionを使うときはthis
          $dbh = $this->dbConnect();
          
          $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
          $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          
          if(!$result) {
            exit('ブログがありません。');
          }
          return $result;
    }

    
}



date_default_timezone_set('Asia/Tokyo');
