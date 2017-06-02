<?php
 session_start();

//delete.phpを参考にいいね機能を作ってみよう。
require('dbconnect.php');

 if(isset($_REQUEST['tweet_id'])){

 // GET送信されたtweet_idを取得（あってもなくてもい）
 	$tweet_id = $_REQUEST['tweet_id'];



 	 $sql = sprintf('INSERT INTO `likes` (`member_id`, `tweet_id`) VALUES (%d,%d);',
 	 $_SESSION['login_member_id'],
 	 $tweet_id);
 	// $sql = 'INSERT `likes` SET `like_id`=1 WHERE `tweet_id` ='.$_REQUEST['tweet_id'];

$tweets = mysqli_query($db,$sql) or die(mysqli_error($db));

    header('Location: index.php');
     exit();
  }
// sql文作成(likesテーブルのINSERT文)
 
// SQL実行

// 一覧のページに戻る。(index.php)


?>