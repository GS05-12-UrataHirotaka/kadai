<?php
//0.外部ファイル読み込み
include('functions.php');

//1.DB接続
$pdo = db_con();

//２．データ選択SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY indate DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>";
    $view .= $result["indate"];
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a href="bm_update_view.php?id='.$result["id"].'">';
    $view .= h($result["book_name"]);
    $view .= "</a>";
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["book_url"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a href="bm_delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';  
    $view .= '</td>';  
    $view .= "</tr>";
  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ブックマーク一覧</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bookmark.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body id="main">

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
            <span class="sr-only">メニュー</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href="/08/bm_list_view.php" class="navbar-brand">BookMark</a>
        </div>
        <div id="gnavi" class="collapse navbar-collapse">
            <ul class="nav navbar-nav  navbar-right">
              <li><a href="/08/bm_list_view.php">ブックマーク一覧</a></li>
              <li><a href="/08/bm_insert_view.php">ブックマーク登録</a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <h2>ブックマーク一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <h4>＜フィルタ＞</h4>
            <form method="post" action="bm_select_view.php" style="display:inline">
                <label>登録期間(開始)：</label>
                <input type="date" name="date_st" class="form-control"><br>
                <label>登録期間(終了)：</label>
                <input type="date" name="date_en" class="form-control"><br>
                <label>書籍名：</label>
                <input type="text" name="book_name" class="form-control"><br>
                <label>URL：</label>
                <input type="text" name="book_url" class="form-control"><br>
                <button type="submit" class="btn btn-info">絞込み</button><br>
            </form>
        </div>
        <div class="col-md-9">
            <table class="table">
            <thead>
               <tr>
                <th>登録日時</th>
                <th>書籍名</th>
                <th>URL</th>
                <th></th>
               </tr>
            </thead>
            <tbody>
                <?=$view?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Main[End] -->

<nav>
    <p style="text-align:right;padding-right:30px;"><font color="white">PHOTO taken by manfred majer</font></p>
</nav>

</body>
</html>
