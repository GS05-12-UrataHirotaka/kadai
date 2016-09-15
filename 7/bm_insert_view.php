<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <p><a class="navbar-brand" href="bm_list_view.php">データ一覧</a></p>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset style="margin-left:20px;">
    <h2>ブックマーク登録</h2>
     <label>書籍名：<input type="text" name="book_name" class="form-control"></label><br>
     <label>URL：<input type="text" name="book_url" class="form-control"></label><br>
     <label>コメント:<br><textArea name="book_comment" rows="2" cols="40" class="form-control"></textArea></label><br>
       <button type="subject" class="btn btn-success">送信</button>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
