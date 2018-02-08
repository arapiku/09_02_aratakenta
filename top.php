<?php
include_once "templates/header.php";

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<h2 class="top_title">Let's share your comments!!</h2>

<form action="signup.php">
    <input type="submit" value="新規会員登録" class="button">
</form>

<div id="container">
    <p class="top_comment">みんなのコメントがたくさん集まってます</p>
    <?php
    try {
        // DB接続
        $pdo = getDb();
        // ステートメントを用意
        $pre_query = 'SELECT * FROM books';
        $stmt = $pdo->prepare($pre_query);
        // ステートメントを実行
        $stmt->execute();
        // $booksにフェッチ
        $books = $stmt->fetchAll();

        // 抽出が成功した時の処理
        print '<ul class="book_list top_book_list">';
        foreach($books as $row) {
            $bid = $row['bid'];
            $title = $row['title'];
            $author = $row['author'];
            $image = $row['image'];

            $pre_query = 'SELECT * FROM comments WHERE bid = :bid';
            $stmt = $pdo->prepare($pre_query);
            $stmt->bindValue(":bid", $bid, PDO::PARAM_STR);
            // ステートメントを実行
            $stmt->execute();
            // $commentsにフェッチ
            $com = $stmt->fetch();

            // bidに関連するコメントデータを一つ取得
            $id = $com["uid"];
            $bid = $com["bid"];
            $title = $com["title"];
            $comment = $com["comment"];

            // コメントデータに付随するユーザーデータを取得
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $status = $stmt->execute();
            // $userにフェッチ
            $user = $stmt->fetch();
            $avatar = $user["avatar"];
        
            print '<li id="'.$bid.'">';
            print '<a href="single.php?bid='.$bid.'">';
            print '<img src="'.$image.'"><br>';
            print $title.'<br>';
            print $author;
            print '</a>';
            if($id) {
            print '<ul class="comment_list top_comment_list">
                    <li>
                        <p style="background-image: url(./uploads/'.$user["avatar"].')" class="comment_avatar"><a href="user.php?id='.$id.'"></a></p>
                        <div class="comment_area">
                            <p class="comment_title">'.h($title).'</p>
                            <p class="comment_text">'.h($comment).'</p>
                        </div>
                    </li>
                    </ul>';
            }
            print '</li>';
        }
        print '</ul>'; 
    } catch (PDOException $e) { 
        $php_errormsg = "DBエラー";
        var_dump($e->getMessage());
    }
    ?>
</div>

<?php include_once "templates/footer.php"; ?>