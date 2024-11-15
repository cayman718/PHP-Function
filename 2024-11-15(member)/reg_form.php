<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member registration</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="regis">
        <?php
        if(isset($_GET['status'])){
            if($_GET['status'] == 1){
                echo '註冊成功';
            }else{
                echo '註冊失敗';
            }
        }
        ?>
    </div>
    <!--form:post>(label+input:text)*4+div>input:submit+input:reset-->
    <div class="register-container">
        <form  action="reg.php" method="post" class="register-form">
            <h2>註冊帳戶</h2>
            
            <input type="text" name="acc" placeholder="帳號" required>
            
            <input type="email" name="email" placeholder="電子郵件" required>
            
            <input type="password" name="pw" placeholder="密碼" required>
            
            <input type="text" name="tel" placeholder="電話" required>
            
            <button type="submit" class="submit-btn">註冊</button>
            
            <p class="login-link">
                已有帳號？<a href="login.php">登入</a>
            </p>
        </form>
    </div>


   