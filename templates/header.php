<?php 
session_start(); // セッションを開始
include_once "config/database.php"; // db情報取得
?> 

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookApp</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <div class="f_left">
        <p class="logo"><a href="index.php">BookApp</a></p>
    </div> 
    <div class="f_right">
        <?php if(isset($_SESSION["ID"])) : ?>
        <p class="avatar" style="background-image:url(./uploads/<?=$_SESSION["AVATAR"]?>)"></p>
        <!-- <p class="logout"><a href="logout.php">ログアウト</a></p> -->
        <p class="search"><a href="search.php">本を追加</a></p>
        <?php else : ?>
        <p class="signup"><a href="signup.php">登録する</a></p>
        <?php endif; ?>
    </div>
</header>
<ul class="menu_modal">
    <li><a href="mypage.php">本棚</a></li>
    <li><a href="profile.php">プロフィール設定</a></li>
    <li id="logout"><a href="logout.php">ログアウト</a></li>
</ul>
<main>