<?php

include_once "templates/header.php";

// エラーメッセージ、サイナップメッセージの初期化
$errorMessage = "";
$signupMessage = "";
$Message = "";

// サイナップボタンが押されたら
if (isset($_POST["signUp"])) {
    // ユーザーIDの入力チェック
    if (empty($_POST['username'])) {
        $errorMessage = "ユーザーIDが未入力です";
    } else if (empty($_POST['password1'])) {
        $errorMessage = "パスワードが未入力です";
    } else if (empty($_POST['password2'])) {
        $errorMessage = "確認用パスワードが未入力です";
    }

    if (!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2']) && $_POST['password1'] == $_POST['password2'] && isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {
        // 入力したユーザーIDとパスワードを取得
        $username = $_POST["username"];
        $password = $_POST["password1"];

        $old_name = $_FILES ['avatar'] ['tmp_name'];
        $new_name = date ( "YmdHis" );
        $new_name .= mt_rand ();
        switch (exif_imagetype ( $_FILES ['avatar'] ['tmp_name'] )) {
            case IMAGETYPE_JPEG :
                $new_name .= '.jpg';
                break;
            case IMAGETYPE_GIF :
                $new_name .= '.gif';
                break;
            case IMAGETYPE_PNG :
                $new_name .= '.png';
                break;
            default :
                header ('Location: signup.php');
                exit();
        }
        $gazou = basename ( $_FILES ['avatar'] ['name'] );
        if (move_uploaded_file ( $old_name, 'uploads/' . $new_name )) {
            $Message = $gazou . 'のアップロードに成功しました';
        } else {
            $Message = 'アップロードに失敗しました';
        }

        try { 
            $pdo = getDb();
            // ステートメントを用意
            $pre_query = 'INSERT INTO users(name, password, avatar) VALUES(?, ?, ?)';
            $stmt = $pdo->prepare($pre_query);
            // ステートメントを実行
            $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT), $new_name]);
            // 登録したユーザーidを取得
            $userid = $pdo->lastinsertid();
            // サイナップメッセージを用意
            $signupMessage = "登録が完了しました。あなたのユーザーIDは".$userid."、ユーザー名は".$username."、パスワードは".$password."です。";

        } catch (PDOException $e) {
            $errorMessage = "DBエラー";
            var_dump($e->getMessage());
        }
    } else if (!empty($_POST['password1']) && !empty($_POST['password2']) && $_POST['password1'] != $_POST['password2']) {
        $errorMessage = "パスワードに誤りがあります。";
    }
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<h1>新規登録画面</h1>
<form id="loginForm" name="loginForm" action="" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>新規登録</legend>
        <div><font color="#ff0000"><?= h($errorMessage); ?></font></div>
        <div><font color="#0000ff"><?= h($signupMessage); ?></font></div>
        <div><font color="#0000ff"><?= h($Message); ?></font></div>
        <p>
            <label for="username">ユーザー名</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) {echo h($_POST["username"]);} ?>">
        </p>
        <p>
            <label for="password1">パスワード</label><input type="password" id="password1" name="password1" value="" placeholder="パスワードを入力">
        </p>
        <p>
            <label for="password2">パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
        </p>
        <p>
            <label for="password2">アバター画像を選択</label><input type="file" id="avatar" name="avatar">
        </p>
        <input type="submit" id="signUp" name="signUp" value="新規登録" class="button">
    </fieldset>
</form>
<br>
<form action="login.php">
    <input type="submit" value="TOPへ戻る" class="button">
</form>

<?php include_once "templates/footer.php"; ?> 