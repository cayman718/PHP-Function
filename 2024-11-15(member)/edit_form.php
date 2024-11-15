<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員資料編輯</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div>
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 1) {
                echo "更新成功";
            } else {
                echo "更新失敗";
            }
        }
        ?>
    </div>

    <?php
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $pdo=new PDO($dsn,'root','');
    $mem=$pdo->query("select * from `member` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="register-container">
        <form action="edit.php" method="post" class="register-form">
            <h2>會員資料</h2>
            
            <input type="text" name="acc" placeholder="帳號" value="<?=$mem['acc'];?>" required>
            
            <input type="email" name="email" placeholder="電子郵件" value="<?=$mem['email'];?>" required>
            
            <input type="password" name="pw" placeholder="密碼" value="<?=$mem['pw'];?>" required>
            
            <input type="text" name="tel" placeholder="電話" value="<?=$mem['tel'];?>" required>
            
            <input type="hidden" name="id" value="<?=$mem['id'];?>">
            <input type="submit" value="編輯">
            <input type="reset" value="重置">
            
            <!-- 使用 JavaScript 清除資料 -->
            <input type="button" value="清除資料" onclick="clearForm()">
        </form>
    </div>

    <script>
        function clearForm() {
            // 清空表單欄位
            document.querySelector('.register-form').reset();
        }
    </script>
</body>

</html>
