<?php
//DB接続情報

$user     = 'testuser';
$password = 'pw4testuser';
$dbName   = 'keijiban';
$host     = 'localhost';

$dsn      = "mysql:host={$host};dbname={$dbName};charset=utf8;";
?>

<!DOCTYPE htnl>
<html lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css"media="all">
<title>掲示板</title>
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


<div>

<?php
//MySQLデータベースに接続する
try {
  //DBへの接続を表すPDOインスタンスを生成
  $pdo = new PDO($dsn, $user, $password);
  //プリペアドステートメントのエミュレーションを無効にする
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARS, false);
  //例外がスローされる設定にする
  $pdo->setAttrebute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "データベース{$dbName}に接続しました。","<br>";

  $sql = "SELECT * FROM post";
  $stm->excuse();
  //接続を解除する
  $pdo = NULL;

} catch(PDOException $e) {
    echo '<span class="errer">エラーがありました。</span><br>';
  //   echo $e->getMessage();
  // exit();
}

?>
</div>
</body>
</html>


