<?php
require_once('vendor/autoload.php');
use Scriptotek\GoogleBooks\GoogleBooks;

// 入力値が空じゃなければ変数に代入
if(!isset($_GET['search_term']) || $_GET['search_term'] != "") {
    $term = htmlspecialchars($_GET['search_term'], ENT_QUOTES, 'UTF-8');
}

$books = new GoogleBooks(['key' => 'AIzaSyACtjvyqjoGQQMNzYTkvvBVFl4njs3wSTc']);

// 取得件数の上限決める（APIリクエスト回数制限が1000件/1日なのでdebug時は少なめに...）
$i = 0;
$loop_num = 6;

if($term) {
    print '<ul class="book_list">';
    foreach ($books->volumes->search($term) as $vol) {
        if($i >= $loop_num) {
            $i = 0;
            break;
        } else {
            $i++;
            $title = htmlspecialchars($vol->title);
            $author = htmlspecialchars($vol->authors[0]);
            $image = $vol->imageLinks->smallThumbnail;
            $bid = $vol->id;
            print '<li>';
            print '<img src="'.$image.'"><br>';
            print $title.'<br>';
            print $author.'<br>';
            print '<form action="book_save.php" method="post" class="save_form">
                            <input type="hidden" name="book" class="book" value="'.$bid.','.$title.','.$author.','.$image.'">
                            <input type="submit" value="保存">
                            </form>';
            print '</li>';
            print PHP_EOL;
        }
    }
    print '</ul>';
}