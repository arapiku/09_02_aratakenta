<?php

include_once "templates/header.php";

// uidと一致する本データを抜き出してリスト表示

$sid = $_SESSION["ID"];
// PDOでDB接続
try { 
    $pdo = getDb();
    // ステートメントを用意
    $pre_query = 'SELECT * FROM books WHERE uid ='.$sid;
    $stmt = $pdo->prepare($pre_query);
    // ステートメントを実行
    $stmt->execute();
    // 抽出が成功した時の処理
    print '<ul class="book_list">';
    foreach($stmt->fetchAll() as $row) { 
        $bid = $row['bid'];
        $title = $row['title'];
        $author = $row['author'];
        $image = $row['image'];

        print '<li id="'.$bid.'">';
        print '<a href="single.php?bid='.$bid.'">';
        print '<img src="'.$image.'"><br>';
        print $title.'<br>';
        print $author;
        print '</a>';
        print '</li>';
    }
    print '</ul>';

} catch (PDOException $e) {
    $errorMessage = "DBエラー";
    var_dump($e->getMessage());
}
include_once "templates/footer.php";
?>