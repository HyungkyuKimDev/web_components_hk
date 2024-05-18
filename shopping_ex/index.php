<!DOCTYPE html>
<html>

<head>
    <title>Book Shopping Site</title>
</head>
<body>
    <h1>Book Shopping Site</h1>
        <card-card></card-card>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <h2>ようこそ <?php echo $_SESSION['user_id']; ?>!</h2>
        <a href="logout.php"><button type="button">ログアウト</button></a>
    <?php else : ?>
        <a href="login.php"><button type="button">ログイン</button></a>
    <?php endif; ?>
    
    <h2>Books</h2>
    
    <!--メッセージを出すための機能!-->
    <?php if (isset($addedMessage)) : ?>
        <p style="color: green;"><?php echo $addedMessage; ?></p>
    <?php endif; ?>
    
    <ul>
        <?php foreach ($books as $book) : ?>
            <li>
                <!-- 本の画像を表示 -->
                <!-- 本の画像を表示します。画像のURLは$book['image']から取得します。 -->
                <img src="img/<?php echo $book['image']; ?>" width="100">
                
                <!-- 本のタイトルを表示 -->
                <!-- 本のタイトルを表示します。タイトルは$book['title']から取得します。 -->
                <h3><?php echo $book['title']; ?></h3>
                
                <!-- 本の著者を表示 -->
                <!-- 本の著者を表示します。著者は$book['author']から取得します。 -->
                <p>著者: <?php echo $book['author']; ?></p>
                
                <!-- 本の価格を表示 -->
                <!-- 本の価格を表示します。価格は$book['price']から取得します。 -->
                <p>価格: ￥<?php echo $book['price']; ?></p>
                
                <!-- カートに追加するフォームを表示 -->
                <!-- カートに追加するためのフォームを表示します。 -->
                <form method="post">
                    <!-- 本のIDを隠しフィールドに設定します。 -->
                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                    
                    <!-- 数量を選択するためのセレクトボックスを表示します。 -->
                    <label>個数:</label>
                    <input type="number" name="quantity" value="1" min="1" required>
                    
                    <!-- カートに追加するためのボタンを表示します。 -->
                    <input type="submit" value="追加">
                    <!-- 商品の詳細ページに移動するためのボタンを表示する。 -->
                    <!--<input type="submit" value="詳細">-->
                    <!-- 商品の詳細ページに移動するためのボタンを表示します。 -->
                    <a href="productdetail.php?book_id=<?php echo $book['id']-1; ?>"><button type="button">詳細</button></a>
                </form>

                <!-- レビューのためのボタン -->
                <form action="review.php" method="POST">
                <button type="submit" value="<?php echo "このの商品のID"; ?>" name="review_write">レビューを作成</button>
                </form>
                <form action="review_check.php" method="POST">
                <button type="submit" value="<?php echo "このの商品のID"; ?>" name="review_check">レビューを見る</button>
                </form>
            </li>
            ----------------------------------------------------------------------------------
        <?php endforeach; ?>
    </ul>
    
    <!-- カートページへのリンクを表示 -->
    <!-- カートページ（cart.php）へのリンクを表示します。 -->
    <a href="cart.php"><button type="button">カートを見る</button></a>

    <script type="module" src="./web.js"></script>
</body>
</html>