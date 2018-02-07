<?php

include_once "templates/header.php";

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: logout.php");
    exit();
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
<h1>書籍を検索する</h1>
<form id="searchform" method="get">
<div>
    <label for="search_term">入力してね</label>
    <input type="text" name="search_term" id="search_term" />
</div>
</form>
<div id="search_results"></div>

<?php include_once "templates/footer.php"; ?>
<script type='text/javascript'>
$(document).ready(function(){
$("#search_results").slideUp();
    $("#search_term").keypress(function(e){
        e.preventDefault();
        ajax_search();
    });

});
// APIの取得結果を返す
function ajax_search(){
    $("#search_results").show();
    var search_val=$("#search_term").val();
    $.get("./search_result.php", {search_term : search_val}, function(data){
        if (data.length>0){
            $("#search_results").html(data);
        }
    });
}

</script>