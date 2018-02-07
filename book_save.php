<?php
// セッションをスタート
session_start();

include_once "config/database.php";

// サイナップボタンが押されたら
if (isset($_POST["book"])) {

    $book = htmlspecialchars($_POST["book"], ENT_QUOTES);
    // var_dump($book);
    $book_array = explode(",", $book);
    // var_dump($book_array[0]);    

    if (!empty($book)) {
        // セッションからユーザーIDを取得
        $uid = $_SESSION["ID"];
        var_dump($uid);

        try { 
            $pdo = getDb();
            // ステートメントを用意
            $pre_query = 'INSERT INTO books(id, uid, bid, title, author, image) VALUES(NULL, :uid, :bid, :title, :author, :image)';
            $stmt = $pdo->prepare($pre_query);
            // バインドする
            $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
            $stmt->bindValue(':bid', $book_array[0], PDO::PARAM_INT);
            $stmt->bindValue(':title', $book_array[1], PDO::PARAM_STR);
            $stmt->bindValue(':author', $book_array[2], PDO::PARAM_STR);
            $stmt->bindValue(':image', $book_array[3], PDO::PARAM_STR);
            // ステートメントを実行
            $stmt->execute();
            // マイページに移動
            header('Location: mypage.php');

        } catch (PDOException $e) {
            $errorMessage = "DBエラー";
            var_dump($e->getMessage());
        }
    } else {
        $errorMessage = "ポストデータが空です。";
    }
}