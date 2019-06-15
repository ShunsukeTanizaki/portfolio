<?php
//DB接続情報
$dsn      = "mysql:host=localhost; dbname=keijiban";
$user     = "root";
$password = "root";

$id = 3;    //プレースホルダーの値を設定

//try-catch
try {
  //DBへの接続を表すPDOインスタンスを生成
  $pdo = new PDO($dsn, $name, $password );
  //SQL文　:は、名前付きプレースホルダ
  $sql = "SELECT * from syain where id = :id";
  //プリペイドステートメントを作成
  $stmt = $pdo->prepare($sql);
  //プレースホルダと変数をバインド
  $stmt->bindParam(":id",$id);
  $stmt->execute();

  //データを取得
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  //接続を閉じる
  //$pdo = null:  スクリプト終了時に自動で切断されるので不要
} catch(PDOException $e) {
  //UTF8に文字エンコーディングを変換する
  exit(mb_convert_encoding($s->getMessage(), 'UTF-8', 'SJIS-win'));
}

function escsape1($str)
{
  return htmlspecialchars($str, ENT_QUOTES,'UTF-8');
}

?>


<!DOCTYPE htnl>
<html lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css"media="all">
<title>サンプル</title>
</head>
<body>
　<section>
　<h2>新規投稿</h2>
　 <?php echo $message; ?>
　  <form method="post" action="">
　  名前：<input type="text" name="name" value="<?php echo $name; ?>" >
　  <?php echo $err_msg1; ?><br>
　  紹介文：<textarea name="Introduction" rows="10" cols="100" wrap="hard" placeholder="紹介文をお書き下さい"><?php echo $comment; ?></textarea>
　  <?php echo $err_msg2; ?><br>
　<input type="submit" name="" value="クリック" >
　 </form>
　</section>
<section>
  <h2>投稿画面</h2>
  <p>投稿はまだありません</p>
　  <dl>
　    <?php foreach( $dataArr as $data ):?>
　    <p><span><?php echo $data["name"]; ?></span>:<span><?php echo $data["Introduction"]; ?></span></p>
　    <?php endforeach;?>
　  </dl>
</section>
</body>
</html>
