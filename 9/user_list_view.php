<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();

if($_SESSION["kanri_flg"]!="1"){
    exit("Error!!");
}

//1.DB接続
$pdo = db_con();

//２．データ選択SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>";
    $view .= h($result["name"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["lid"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["lpw"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["kanri_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a class="btn btn-primary" href="user_update_view.php?id='.$result["id"].'">';
    $view .= '変更';
    $view .= '</a>';  
    $view .= "</td>";
    $view .= "</tr>";
  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ユーザ一覧</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bookmark.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body id="main">

<!-- Head[Start] -->
<?php  
    if($_SESSION["kanri_flg"]=="1"){
        include("bm_admenu.php");
    }else{
        include("bm_menu.php");
    }
    
?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>ユーザ一覧</h2>
            <table class="table">
            <thead>
               <tr>
                <th>名前</th>
                <th>ユーザID</th>
                <th>パスワード</th>
                <th>管理フラグ</th>
                <th>利用フラグ</th>
                <th></th>
               </tr>
            </thead>
            <tbody>
                <?=$view?>
            </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<!-- Main[End] -->

<nav>
    <p style="text-align:right;padding-right:30px;"><font color="white">PHOTO taken by manfred majer</font></p>
</nav>

</body>
</html>
