<?php
// セッションをスタート
session_start();

include_once "config/database.php";

// コメント送信ボタンが押されたら
if (isset($_POST["bid"]) && isset($_POST["title"]) && isset($_POST["comment"])) {

    $bid = htmlspecialchars($_POST["bid"], ENT_QUOTES);
    $title = htmlspecialchars($_POST["title"], ENT_QUOTES);
    $comment = htmlspecialchars($_POST["comment"], ENT_QUOTES);

        // セッションからユーザーIDを取得
    $uid = $_SESSION["ID"];

    try { 
        $pdo = getDb();
        // ステートメントを用意
        $pre_query = 'INSERT INTO comments(id, uid, bid, title, comment) VALUES(NULL, :uid, :bid, :title, :comment)';
        $stmt = $pdo->prepare($pre_query);
        // バインドする
        $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
        $stmt->bindValue(':bid', $bid, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        // ステートメントを実行
        $stmt->execute();
        // コメントデータを返す
        $pre_query = 'SELECT * FROM comments WHERE bid = :bid';
        $stmt = $pdo->prepare($pre_query);
        // バインドする
        $stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
        // ステートメントを実行
        $stmt->execute();
        // single.phpに戻る
        header('Location: mypage.php');
    } catch (PDOException $e) {
        $errorMessage = "DBエラー";
        var_dump($e->getMessage());
    }
    
}