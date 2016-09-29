<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ログイン</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bookmark.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <div class="navbar-brand">ログイン</div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" id="login">
            <form method="post" action="login_act.php" style="display:inline">
                <h2>ログイン</h2>
                <label>ユーザID：</label>
                <input type="text" name="lid" class="form-control"><br>
                <label>パスワード：</label>
                <input type="text" name="lpw" class="form-control"><br>
                <button type="submit" class="btn btn-primary">ログイン</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>