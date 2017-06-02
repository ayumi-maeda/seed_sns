<?php
 session_start();

//delete.phpを参考にいいね機能を作ってみよう。
require('dbconnect.php');

 if(isset($_REQUEST['tweet_id'])){

 // GET送信されたtweet_idを取得（あってもなくてもい）
 	$tweet_id = $_REQUEST['tweet_id'];


 	// sql文作成(likesテーブルのDelete文)
 	// DELETE分はWHEREを忘れずに。忘れると全部消えちゃう
 	 $sql = sprintf('DELETE FROM `likes` WHERE `member_id`=%d AND `tweet_id`=%d;',
 	 $_SESSION['login_member_id'],
 	 $tweet_id);
 	// $sql = 'INSERT `likes` SET `like_id`=1 WHERE `tweet_id` ='.$_REQUEST['tweet_id'];

$tweets = mysqli_query($db,$sql) or die(mysqli_error($db));

    header('Location: index.php');
     exit();
  }
 
// SQL実行

// 一覧のページに戻る。(index.php)


?>