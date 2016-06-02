<?php // テンプレート（フッター部分） ?>
    <div id="footer">
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="https://gacha-practice.herokuapp.com/mypage/mypage.php">マイページへ戻る</a>
        <?php else: ?>
            <a href="https://gacha-practice.herokuapp.com/index.php">トップへ戻る</a>
        <?php endif; ?>
    </div>
</body>
</html>