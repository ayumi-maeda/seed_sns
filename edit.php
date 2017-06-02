<?php 
 require('dbconnect.php');

 $sql = 'SELECT `members`.`nick_name`,`members`.`picture_path`,`tweets`.* FROM `tweets` INNER JOIN `members` on `tweets`.`member_id` = `members`.`member_id` WHERE `tweets`.`tweet_id` ='.$_REQUEST['tweet_id'];

 $tweets = mysqli_query($db,$sql) or die(mysqli_error($db));

     $tweet = mysqli_fetch_assoc($tweets);

     // 保存ボタンが押された時
     if (isset($_POST) && !empty($_POST['tweet'])) {
       // UPDATA分を作成
        $sql = sprintf('UPDATE `tweets` SET `tweet`="%s"  WHERE `tweet_id` =%d',
          mysqli_real_escape_string($db,$_POST['tweet']),
          mysqli_real_escape_string($db,$_POST['tweet_id']));
      // sql実行
        mysqli_query($db,$sql) or die(mysqli_error($db));

      // 一覧に戻る
        header('Location: index.php');
         exit();
     }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SeedSNS</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/form.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

  </head>
  <body>
  <?php include('navi.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 content-margin-top">
      <!-- <?php 
           // foreach ($tweets_array as $tweet_each) { ?> -->
        <div class="msg">
          <img src="member_picture/<?php echo $tweet['picture_path']; ?>" width="100" height="100">

          <p>投稿者 : <span class="name"><?php echo $tweet['nick_name']; ?></span></p>
          <p>
           つぶやき：<br>
            <form method="post" action="" class="form-horizontal" role="form">
             <textarea name="tweet" cols="50" rows="5" class="form-control" placeholder="例：Hello World!"><?php echo $tweet['tweet']; ?></textarea>
             <input type="hidden" name="tweet_id" value="<?php echo $tweet['tweet_id']; ?>">
             <input type="submit" class="btn btn-info" value="保存">
            </form>
          </p>
          <p class="day">
            <?php echo $tweet['created']; ?>
          </p>
        </div>
        
        <a href="index.php">&laquo;&nbsp;一覧へ戻る</a>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-3.1.1.js"></script>
    <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
  </body>
</html>
