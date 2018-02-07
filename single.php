<?php

include_once "templates/header.php";

$bid = $_GET["bid"];
  
//1．データ登録SQL作成
try { 
    $pdo = getDb();
    // ステートメントを用意
    $stmt = $pdo->prepare("SELECT * FROM books WHERE bid = :bid");
    $stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
    $status = $stmt->execute();
    $book = $stmt->fetch();

    // ステートメントを用意
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE bid = :bid");
    $stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
    $status = $stmt->execute();
    $comments = $stmt->fetchAll();

} catch (PDOException $e) {
    $errorMessage = "DBエラー";
    var_dump($e->getMessage());
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>

<p><?= h($book['title']) ?></p>
<p><?= h($book['author']) ?></p>
<p><img src="<?= $book['image'] ?>"></p>

<form action="comment_save.php" method="post" id="comment_form">
    <p><input type="hidden" name="bid" value="<?= h($book['bid'])?>"></p>
    <p><label>タイトル</label><input type="text" name="title" value="" placeholder="タイトルを入力してね" required></p>
    <p><label>コメント</label><textarea name="comment" id="" cols="30" rows="10" placeholder="コメントを入力してね" required></textarea></p>
    <p><input type="submit" value="コメントする" class="button"></p>
</form>
<div id="search_results"></div>

<?php if($comments): ?>
<ul class="comment_list">
    <?php foreach($comments as $comment): ?>
    <?php 
        // ステートメントを用意
        $id = $comment["uid"];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $status = $stmt->execute();
        $user = $stmt->fetch();
    ?>
    <?php $id = $comment["uid"]; ?>
    <li>
        <p style="background-image: url(uploads/<?=$user["avatar"]?>)" class="comment_avatar"><a href="user.php?id=<?=$user["id"]?>"></a></p>
        <div class="comment_area">
            <p class="comment_title"><?= h($comment["title"]) ?></p>
            <p class="comment_text"><?= h($comment["comment"]) ?></p>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p>コメントはまだありません。</p>
<?php endif; ?>

<?php include_once "templates/footer.php"; ?>