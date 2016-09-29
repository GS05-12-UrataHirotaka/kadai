<?php
session_start();
include('functions.php');
ssidCheck();

if($_SESSION["kanri_flg"]!="1"){
    exit("Error!!");
}

//1.GETでidを取得
$id = $_GET['id'];

//2.DB接続など
$pdo = db_con();

//3.idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id' , $id , PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    $row = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ユーザ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bookmark.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="user_update.php" style="display:inline">
                <h2>ユーザ更新</h2>
                <label>名前：</label>
                <input type="text" name="name" class="form-control" value="<?=$row["name"]?>"><br>
                <label>ユーザID：</label>
                <input type="text" name="lid" class="form-control" value="<?=$row["lid"]?>"><br>
                <label>パスワード：</label>
                <input type="text" name="lpw" class="form-control" value="<?=$row["lpw"]?>"><br>
                <label>管理フラグ：</label>
                <input type="radio" name="kanri_flg" id="aduser" class="inlineRadioOptions" value="1" <?php if($row["kanri_flg"]==1){print "checked";}?>><label for="aduser">管理者</label>
                <input type="radio" name="kanri_flg" id="nuser" class="inlineRadioOptions" value="0" <?php if($row["kanri_flg"]==0){print "checked";}?>><label for="nuser">一般ユーザ</label><br><br>
                <label>利用フラグ：</label>
                <input type="radio" name="life_flg" id="active" class="inlineRadioOptions" value="0" <?php if($row["life_flg"]==0){print "checked";}?>><label for="active">利用中</label>
                <input type="radio" name="life_flg" id="suspend" class="inlineRadioOptions" value="1" <?php if($row["life_flg"]==1){print "checked";}?>><label for="suspend">利用停止</label><br><br>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" class="btn btn-primary">送信</button>
                <a class="btn btn-warning" href="user_list_view.php">キャンセル</a>
                　　
                <a class="btn btn-danger" href="user_delete.php?id=<?=$id?>">削除</a> 
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->


</body>
</html>