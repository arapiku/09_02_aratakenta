<?php
include_once "templates/header.php";

// エラーメッセージの初期化
$errorMessage = "";

$flag = $_SESSION['ADMIN'];
$uid = $_SESSION["ID"];
$username = $_SESSION["NAME"];
$avatar = $_SESSION["AVATAR"];

// 管理者じゃなかったら弾く
if($flag == 0) {
    header('Location: logout.php');
    exit();
} 
  
//1．データ登録SQL作成
try { 
    $pdo = getDb();
    // ステートメントを用意
    $stmt = $pdo->prepare("SELECT * FROM users");
    $status = $stmt->execute();
    // フェッチデータをusers変数に格納
    $users = $stmt->fetchAll();

} catch (PDOException $e) {
    $errorMessage = "DBエラー";
    var_dump($e->getMessage());
}

if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = $id");
    $status = $stmt->execute();
    header('Location: dashboard.php');
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>

<div><p style="color: #f00;"><?= $errorMessage ?></p></div>

<table id="user_table">
    <thead>
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>パスワード</th>
            <th>画像</th>
            <th>管理者</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) : ?>
        <tr>
            <td><?= $user["id"] ?></td>
            <td><?= h($user["name"]) ?></td>
            <td><?= h($user["password"]) ?></td>
            <td><?= $user["avatar"] ?></td>
            <td><?= $user["administrator"] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $user["id"] ?>">
                    <input type="submit" value="×">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include_once "templates/footer.php"; ?>