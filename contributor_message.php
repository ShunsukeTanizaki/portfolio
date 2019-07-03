<?php
session_start();
require('dbconnect.php');

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) { //セッション　60分
  $_SESSION['time'] = time();

  $members = $db->prepare('SELECT * FROM members WHERE id=?');
  $members->execute(array($_SESSION['id']));
  $member = $members->fetch();
} else {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>投稿画面</title>
</head>

<body>
<div id="wrap">
  <div id="head">
    <h1>投稿画面</h1>
  </div>
  <div id="content">
    <div id="lead">
      <p>入会手続きがまだの方はこちらからどうぞ。</p>
      <p>&raquo;<a href="join/">入会手続きをする</a></p>
    </div>
    <form action="" method="post">
      <dl>
        <dt>メールアドレス</dt>
        <dd>
          <input type="text" name="email" size="35" maxlength="255" value="<?php print (htmlspecialchars($email, ENT_QUOTES)); ?>" />
          <?php if ($error['login'] === 'blank'): ?>
            <p class="error">メールアドレスとパスワードを入力してください</p>
          <?php endif; ?> 
          <?php if ($error['login'] === 'feiled'): ?>
            <p class="error">ログインに失敗しました</p>
          <?php endif; ?>  
        </dd>
        <dt>パスワード</dt>
        <dd>
          <input type="password" name="password" size="35" maxlength="255" value="<?php print (htmlspecialchars($_POST['password'], ENT_QUOTES)); ?>" />
        </dd>
        <dt>画像</dt>
        <dd>
          <input type="file" name="image" size="35" value="test" />
          <?php if ($error['image'] === 'type'): ?>
          <p class="error">*「.jpg」「.gif」「.png」の画像を指定してください</p>
          <?php endif; ?>
          <?php if (!empty($error)): ?>
          <p class="error">*画像を再指定してください</p>
          <?php endif; ?>
        </dd>
        <dt>紹介文</dt>
        <dd>
          <textarea name="message" cols="50" rows="5" ><?php print (htmlspecialchars($message, ENT_QUOTES)); ?></textarea>
        </dd>
      </dl>
    </form>
  </div>
  <div id="foot">
    <!-- <p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p> -->
  </div>
</div>
</body>
</html>