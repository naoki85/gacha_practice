<?php // テンプレート（フッター部分） ?>
    <div>
        <?php if(isset($_SESSION['user_id'])) : ?>
            <a href="/mypage/mypage">マイページへ戻る</a>
        <?php else: ?>
            <a href="/index">マイページへ戻る</a>
        <?php endif; ?>
    </div>
</body>
</html>