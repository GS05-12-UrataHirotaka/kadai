<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
            <span class="sr-only">メニュー</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand"><?php echo $_SESSION["name"] ?></div>
        </div>
        <div id="gnavi" class="collapse navbar-collapse">
            <ul class="nav navbar-nav  navbar-right">
              <li><a href="user_list_view.php">ユーザ一覧</a></li>
              <li><a href="user_insert_view.php">ユーザ登録</a></li>
              <li><a href="bm_list_view.php">ブックマーク一覧</a></li>
              <li><a href="bm_insert_view.php">ブックマーク登録</a></li>
              <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </nav>
</header>